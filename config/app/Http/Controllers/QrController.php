<?php

namespace App\Http\Controllers;

use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\Qrcode as QrCodeModel;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Notification;
use App\Models\Product;
use App\Models\Complaint;
use App\Models\PdfImage;
use Illuminate\Support\Facades\Auth;
use App\Events\NotificationSent;
use Carbon\Carbon;
use App\Jobs\GenerateQRCodesJob;

class QrController extends Controller
{

    public function createSingleQrcode()
    {
        // Dispatch the job 10 times
        for ($i = 0; $i < 10; $i++) {
            GenerateQRCodesJob::dispatch(1);
        }


        // Return an immediate response
        return response()->json([
            'message' => 'QR Code generation started in background.',
            'status' => 'success'
        ]);
    }

    public function createdoubleQrcode()
    {
        // Dispatch the job 10 times
        for ($i = 0; $i < 10; $i++) {
            GenerateQRCodesJob::dispatch(2);
        }


        // Return an immediate response
        return response()->json([
            'message' => 'QR Code generation started in background.',
            'status' => 'success'
        ]);
    }

    //     public function createQrcode()
// {
//     $totalCodes = 9000 ; // Total number of QR codes to generate
//     $batchSize = 1800;   // Batch size for each job

    //     // Dispatch each job in a loop
//     for ($i = 0; $i < $totalCodes; $i += $batchSize) {
//         $start = $i + 1;
//         $end = min($i + $batchSize, $totalCodes); // Ensure the end does not exceed total codes

    //         // Dispatch each job (timeout is already set in the job class)
//         dispatch(new GenerateQRCodesJob($start, $end));
//     }

    //     // Return an immediate response
//         return response()->json([
//             'message' => 'QR Code generation started in background.',
//             'status' => 'success'
//         ]);
// }

    public function getPdf()
    {
        // Retrieve all PDF records from the `pdf_images` table
        $pdfRecords = PdfImage::all();

        // If there are no PDF records, return a message indicating so
        if ($pdfRecords->isEmpty()) {
            return response()->json(['message' => 'No PDFs found'], 404);
        }

        // Prepare the response data with IDs and PDF paths
        $pdfData = $pdfRecords->map(function ($pdf) {
            return [
                'id' => $pdf->id,
                'pdf_path' => asset('public/' . $pdf->pdf_path)
            ];
        });

        // Return the PDF IDs and paths as a JSON response
        return response()->json([
            'message' => 'PDFs retrieved successfully',
            'status' => 'success',
            'pdf_data' => $pdfData,
        ], 200);
    }

    public function deletePdf($id)
    {
        // Find the PDF record by ID
        $pdfRecord = PdfImage::find($id);

        // Check if the PDF record exists
        if (!$pdfRecord) {
            return response()->json(['message' => 'PDF not found'], 404);
        }

        // Get the PDF path
        $pdfPath = public_path($pdfRecord->pdf_path);

        // Delete the PDF file if it exists
        if (file_exists($pdfPath)) {
            unlink($pdfPath);
        }
        // Delete the PDF record from the database
        $pdfRecord->delete();

        // Return a success response
        return response()->json([
            'message' => 'PDF deleted successfully',
            'status' => 'success'
        ], 200);
    }

    public function clearAllPdfs()
    {

        // Retrieve all PDF records
        $pdfRecords = PdfImage::all();

        // Check if there are no PDF records
        if ($pdfRecords->isEmpty()) {
            return response()->json([
                'message' => 'No PDFs to delete',
                'data' => $pdfRecords
            ]);
        }

        // Loop through each PDF record and delete the corresponding file and record
        foreach ($pdfRecords as $pdfRecord) {
            // Get the PDF path
            $pdfPath = public_path($pdfRecord->pdf_path);

            // Delete the PDF file if it exists
            if (file_exists($pdfPath)) {
                unlink($pdfPath);
            }

            // Delete the PDF record from the database
            $pdfRecord->delete();
        }

        // Return a success response
        return response()->json([
            'message' => 'All PDFs deleted successfully',
            'status' => 'success'
        ], 200);
    }




    public function redeemPoints(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'data' => 'required|string', // Ensure 'data' is present and is a string
        ]);

        $user = auth()->user(); // Get the authenticated user
        $data = $request->input('data'); // Get the QR code data from the request

        if ($user->status !== 'suspended') {

            // Find the QR code in the database
            $qrCode = QrCodeModel::where('data', $data)->first();

            // Check if the QR code exists
            if ($qrCode) {
                // If QR code is found and its status is not already 1, update its status
                if ($qrCode->status !== 1) {
                    $qrCode->status = 1; // Set the status to 1
                    $qrCode->user_id = $user->id; // Set the user_id to the authenticated user's ID
                    $qrCode->scanned_at = now();
                    $qrCode->save(); // Save the changes to the QR code

                    // Increment the user's points in the userdetails table
                    $userDetails = UserDetails::where('user_id', $user->id)->first();

                    // $userDetails->increment('point'); // Increment the points by 1 (or adjust as needed)
                    if ($userDetails) {
                        $pointsToAdd = $qrCode->point == 2 ? 2 : 1;

                        $userDetails->increment('point', $pointsToAdd);
                    }
                    // Fetch all products
                    $products = Product::all();

                    // Iterate through each product to check if the user is close to redeeming
                    foreach ($products as $product) {
                        $requiredPoints = $product->point;
                        $difference = $requiredPoints - $userDetails->point;

                        // If the difference is exactly 25 or 10 points
                        if ($difference === 25 || $difference === 10) {
                            // Calculate how many points are left to redeem the product
                            $pointsRemaining = $requiredPoints - $userDetails->point;

                            // Prepare the notification message
                            $message = "You are {$pointsRemaining} points away from redeeming {$product->product_info}!";

                            // Save the notification in the database
                            Notification::create([
                                'user_id' => $user->id, // ID of the user
                                'message' => $message,
                                'image' => $product->product_image,
                            ]);
                        } elseif ($userDetails->point == $requiredPoints) {
                            // Prepare the notification message
                            $message = "You are eligible for redeeming {$product->product_info}!";

                            // Save the notification in the database
                            Notification::create([
                                'user_id' => $user->id, // ID of the user
                                'message' => $message,
                                'image' => $product->product_image,
                            ]);

                        }
                    }

                    return response()->json([
                        'message' => 'Points redeemed successfully',
                        'points' => $userDetails->point,
                        'status' => 'success',
                    ], 200);
                } else {
                    return response()->json([
                        'message' => 'QR code already redeemed',
                        'status' => 'failed'
                    ], 200);
                }
            } else {
                return response()->json([
                    'message' => 'Invalid QR code',
                    'status' => 'invalid'
                ], 200);
            }
        } else {
            return response()->json([
                'message' => 'Your account has been suspended..!',
                'status' => 'suspended'
            ], 200);
        }
    }


    public function getPoint()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Check if user exists
        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }

        // Assuming there is a 'user_id' foreign key in the 'userdetails' table to associate details with the user
        $userDetails = UserDetails::where('user_id', $user->id)->first();

        // Check if user details exist
        if (!$userDetails) {
            return response()->json(['message' => 'User details not found'], 404);
        }

        // Assuming there's a 'points' column in the 'userdetails' table
        $points = $userDetails->point;

        // Return the points in JSON response
        return response()->json([
            'message' => 'success',
            'points' => $points
        ]);
    }

    public function getUserNotifications()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Calculate the time one month ago
        $oneMonthAgo = Carbon::now()->subMonth();

        // Delete notifications older than one month
        Notification::where('created_at', '<', $oneMonthAgo)->delete();
        // Fetch notifications for the user
        $notifications = Notification::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        // Get the last notification created at least 1 minute ago
        $SecondsAgo = Carbon::now()->subSeconds(10);
        // Calculate the time 1 minute ago
        $new_notification = Notification::where('user_id', $user->id)
            ->where('created_at', '>=', $SecondsAgo)
            ->orderBy('created_at', 'desc')
            ->first();


        return response()->json([
            'message' => 'User notifications retrieved successfully',
            'new_notification' => $new_notification,
            'notifications' => $notifications,
        ], 200);
    }

    public function compalints(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'qr_data' => 'required|string', // Ensure qr_data is required and a string
        ]);

        // Get the authenticated user's ID
        $userId = Auth::id();

        // Create a new complaint
        $complaint = Complaint::create([
            'user_id' => $userId,
            'qr_data' => $request->input('qr_data'), // Set qr_data from the request
            'action' => 'pending', // Default action can be set to 'pending'
        ]);

        // Return a success response
        return response()->json([
            'message' => 'Complaint created successfully.',
            'complaint' => $complaint,
        ], 201); // 201 Created
    }
    
    public function getEarnedPoints()
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }

        // Retrieve all redeemed/scanned QR codes by this user
        $scannedQrs = QrCodeModel::where('user_id', $user->id)
            ->where('status', 1)
            ->orderBy('scanned_at', 'desc')
            ->get();

        $data = $scannedQrs->map(function ($item) {
            return [
                'id' => $item->id,
                'point' => (string) ($item->point ?? 1),
                'qr_data' => $item->data,
                'title' => 'QR Code Scanned',
                'created_at' => $item->scanned_at 
                    ? Carbon::parse($item->scanned_at)->toIso8601String() 
                    : ($item->updated_at ? Carbon::parse($item->updated_at)->toIso8601String() : Carbon::now()->toIso8601String()),
            ];
        });

        return response()->json($data, 200);
    }

}
