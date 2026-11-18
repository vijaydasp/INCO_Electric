<?php

namespace App\Http\Controllers;

use App\Models\PdfImage;
use App\Models\RedeemedProduct;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\Qrcode as QrCodeModel;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;
use ZipArchive;

class WebController extends Controller
{
    public function adminLogin()
    {
        return view('admin.login');
    }

    public function adminLoginSubmit(Request $request)
    {
        \Log::info('Admin login attempt for : ' . $request->all);
        // 1️⃣ Validate input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        // 2️⃣ Attempt login with admin role
        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
            'role'     => 'admin',
            'status'   => 'active',
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // 3️⃣ Redirect to admin dashboard
            return redirect()->route('admin.dashboard')
                ->with('success', 'Welcome Admin!');
        }

        // 4️⃣ Login failed
        return back()->withErrors([
            'email' => 'Invalid credentials or not an admin account.',
        ]);
    }

public function adminDashboard()
{
    $data = [
        'usersCount'      => User::where('role', 'user')->count(),
        'pendingRedeems'  => RedeemedProduct::where('status', 'pending')->count(),
        'shippedRedeems'  => RedeemedProduct::where('status', 'shipped')->count(),
        'totalRedeems'    => RedeemedProduct::count(),
    ];

    return view('admin.dashboard', compact('data'));
}

public function userindex()
{
    $users = User::with('userdetails')
                ->where('role', 'user')
                ->latest()
                ->paginate(10);

    return view('admin.users', compact('users'));
}


   public function userSearch(Request $request)
{
    $search = strtolower($request->search);


    $users = User::with('userdetails')
        ->where('role', 'user')
        ->where(function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('phone', 'LIKE', "%{$search}%")
                  ->orWhereHas('userdetails', function ($q) use ($search) {
                      $q->where('place', 'LIKE', "%{$search}%")
                        ->orWhere('city', 'LIKE', "%{$search}%")
                        ->orWhere('district', 'LIKE', "%{$search}%");
                  });
        })
        ->get();

    return response()->json($users);
}

public function show($id)
{
    $user = User::with('userdetails')->findOrFail($id);
    $redeems = RedeemedProduct::with('product')
                ->where('user_id', $id)
                ->latest()
                ->get();
    return view('admin.user-details', compact('user','redeems'));
}

public function updatePoints(Request $request, $id)
{
    $userDetails = UserDetails::where('user_id', $id)->firstOrFail();
    $userDetails->point = $request->point;
    $userDetails->save();

    return response()->json(['point' => $userDetails->point]);
}

public function filter(Request $request, $id)
{
    $query = RedeemedProduct::with('product')
        ->where('user_id', $id);

    if ($request->status) {
        $query->where('status', $request->status);
    }

    $redeems = $query->latest()->get()->map(function ($r) {
        return [
            'id'            => $r->id,
            'product_name'  => $r->product->product_info ?? '-',
            'product_image' => $r->product->product_image ?? null,
            'address'       => $r->address ?? '-',
            'status'        => $r->status,
            'created_at'    => Carbon::parse($r->created_at)
                                    ->format('d M Y, h:i A'),
        ];
    });

    return response()->json([
        'redeems' => $redeems
    ]);
}

public function pendingRedeems()
{
    $redeems = RedeemedProduct::with(['user', 'product'])
        ->where('status', 'pending')
        ->latest()
        ->get();

    return view('admin.redeems', compact('redeems'));
}

public function redeemHistory()
{
    $redeems = RedeemedProduct::with(['user', 'product'])
        ->where('status', 'shipped')
        ->latest()
        ->get();

    return view('admin.redeem_history', compact('redeems'));
}

public function shippingSlipView(RedeemedProduct $redeem)
{
    // Load user relationship (and any nested details if needed)
    $redeem->load('user');

    return view('admin.shipping-slip-pdf', compact('redeem'));
}


public function generateSlip(Request $request, RedeemedProduct $redeem)
{
    // Update editable fields
    $redeem->update($request->only(['shipping_date', 'remarks', 'address']));

    // Generate PDF using clean slip template
    $pdf = Pdf::loadView('admin.slip-pdf', compact('redeem'))
              ->setPaper('A3', 'portrait');

    return $pdf->download('shipping-slip-'.$redeem->id.'.pdf');
}

public function markAsShipped(Request $request, $id)
{
    $redeem = RedeemedProduct::findOrFail($id);
    $redeem->status = 'shipped';
    $redeem->save();

    return redirect()->back()->with('success', 'Redeem marked as shipped.');

}

// public function getPdf()
//     {
//         $pdfs = PdfImage::latest()->get();
//         return view('admin.qrpdf', compact('pdfs'));
//     }

public function getQrPage(){
    return view('admin.qr-page');
}

public function getPdf(Request $request)
{
    $pdfs = PdfImage::latest()->get();

    if ($request->ajax()) {
        return view('admin.qr.table-rows', compact('pdfs'));
    }

    return view('admin.qrpdf', compact('pdfs'));
}

public function getPdf2(Request $request)
{
    $pdfs = PdfImage::latest()->get();

    if ($request->ajax()) {
        return view('admin.qr.table-rows', compact('pdfs'));
    }

    return view('admin.qrpdf2', compact('pdfs'));
}



    public function download($id)
    {
        $pdf = PdfImage::findOrFail($id);
        $path = public_path($pdf->pdf_path);

        return response()->download($path);
    }

     public function downloadAll()
    {
        $zip = new ZipArchive();
        $zipName = 'qr_pdfs_' . time() . '.zip';
        $zipPath = storage_path("app/public/{$zipName}");

        if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
            PdfImage::each(function ($pdf) use ($zip) {
                $filePath = public_path($pdf->pdf_path);
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, basename($filePath));
                }
            });
            $zip->close();
        }

        return response()->download($zipPath)->deleteFileAfterSend();
    }

    public function clearAll()
    {
        $pdfs = PdfImage::all();

        foreach ($pdfs as $pdf) {
            $path = public_path($pdf->pdf_path);
            if (file_exists($path)) {
                unlink($path);
            }
            $pdf->delete();
        }

        return redirect()->back()->with('success', 'All PDFs cleared successfully');
    }

    public function qrHistory(User $user)
{
   $histories = QrCodeModel::where('user_id', $user->id)
        ->where('status', 1)
        ->latest('scanned_at')
        ->paginate(10);

    return view('admin.users-qr-history', compact('user', 'histories'));
}
}