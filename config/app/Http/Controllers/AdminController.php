<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\Complaint;
use App\Models\Qrcode;
use App\Models\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function getBanners()
    {
        $banners = Banner::orderBy('created_at', 'desc')->get();
    
        return response()->json($banners);
    }
    
public function createBanner(Request $request)
{
    // Validate the request
    $request->validate([
        'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif', // Image validation
    ]);

    // Define the destination path
    $destinationPath = public_path('uploads/banners');
    if (!file_exists($destinationPath)) {
        mkdir($destinationPath, 0755, true); // Create the directory if it doesn't exist
    }

    // Store the uploaded banner image in 'uploads/banners'
    $image = $request->file('banner_image');
    $imageName = time() . '_' . $image->getClientOriginalName();
    $image->move($destinationPath, $imageName);

    // Create the banner
    Banner::create([
        'banner_image' => 'uploads/banners/' . $imageName,
    ]);

    return response()->json(['message' => 'Banner created successfully']);
}

public function editBanner(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif', // Image validation
    ]);

    // Find the banner by ID
    $banner = Banner::findOrFail($id);

    // Delete the old banner image from public storage if it exists
    if ($banner->banner_image && file_exists(public_path($banner->banner_image))) {
        unlink(public_path($banner->banner_image));
    }

    // Define the destination path
    $destinationPath = public_path('uploads/banners');
    if (!file_exists($destinationPath)) {
        mkdir($destinationPath, 0755, true); // Create the directory if it doesn't exist
    }

    // Store the new banner image in 'uploads/banners'
    $image = $request->file('banner_image');
    $imageName = time() . '_' . $image->getClientOriginalName();
    $image->move($destinationPath, $imageName);

    // Update the banner image
    $banner->update([
        'banner_image' => 'uploads/banners/' . $imageName,
    ]);

    return response()->json(['message' => 'Banner updated successfully']);
}

public function deleteBanner($id)
{
    // Find the banner by ID
    $banner = Banner::findOrFail($id);

    // Delete the banner image from public storage if it exists
    if ($banner->banner_image && file_exists(public_path($banner->banner_image))) {
        unlink(public_path($banner->banner_image));
    }

    // Delete the banner record from the database
    $banner->delete();

    return response()->json(['message' => 'Banner deleted successfully']);
}



    public function toggleStatus($id)
    {
        // Find the user by ID
        $user = User::find($id);

        // Check if the user exists
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        if ($user->status !== 'suspended') {
            $user->status = 'suspended';
            $user->save();

            // Prepare the notification message
            $message = "your account is suspended..!";

            // Save the notification in the database
            Notification::create([
                'user_id' => $user->id, // ID of the user
                'message' => $message,
                'image' => 'alert.png',
            ]);

        } else {
            $user->status = 'active';
            $user->save();
            // Prepare the notification message
            $message = "your account is Active..!";

            // Save the notification in the database
            Notification::create([
                'user_id' => $user->id, // ID of the user
                'message' => $message,
                'image' => 'alert.png',
            ]);
        }

        return response()->json([
            'message' => 'success',
            'status' => $user->status
        ], 200);
    }


    public function getCompalints()
    {
        // Fetch complaints with action 'pending'
        $complaints = Complaint::where('action', 'pending')->get();

        // Map the complaints to include complainant and defendant details
        $complaintsWithDetails = $complaints->map(function ($complaint) {

            // Fetch the complainant's details (from user_id)
            $complainant = User::with('userdetails')->where('id', $complaint->user_id)->first();

            // Fetch QR code data associated with the complaint
            $qrCode = QRCode::where('data', $complaint->qr_data)->first();

            // Fetch defendant details using the user_id from the QR code
            $defendant = $qrCode ? User::with('userdetails')->where('id', $qrCode->user_id)->first() : null;

            // Format the response
            return [
                'complaint_id' => $complaint->id,
                'complainant' => [
                    'user_id' => $complainant->id,
                    'name' => $complainant->name,
                    'email' => $complainant->email,
                    'phone' => $complainant->phone,
                    'image' => $complainant->userdetails->profile,
                ],
                'defendant' => $defendant ? [
                    'user_id' => $defendant->id,
                    'name' => $defendant->name,
                    'email' => $defendant->email,
                    'phone' => $defendant->phone, // Assuming the 'details' relationship is defined
                ] : null, // If no defendant is found, return null
            ];
        });

        // Return the mapped response
        return response()->json($complaintsWithDetails);
    }


    public function rejectComplaints($id)
    {
        // Find the complaint by ID or throw a 404 error if not found
        $complaint = Complaint::findOrFail($id);

        // Update the complaint's action to 'rejected'
        $complaint->action = 'rejected';
        $complaint->save(); // Save the changes

        // Prepare the notification message
        $message = "your complaint is rejected..!";

        // Save the notification in the database
        Notification::create([
            'user_id' => $complaint->user->id, // ID of the user
            'message' => $message,
            'image' => 'alert.png',
        ]);

        $complaint->delete();
        // Return a success response
        return response()->json([
            'message' => 'Complaint rejected successfully.',
        ], 200);
    }

    public function acceptComplaints($id)
    {
        // Step 1: Retrieve the complaint by ID
        $complaint = Complaint::find($id);

        if (!$complaint) {
            return response()->json(['message' => 'Complaint not found.'], 404); // Not Found
        }

        // Step 2: Get the QR code ID from the qr_data field
        $qrData = $complaint->qr_data;

        $complainant_id = $complaint->user_id;

        // Assuming the QR code ID is stored directly in the qr_data field.
        // If it's encoded or needs parsing, you might need to adjust this logic.
        $qrCode = QrCode::where('data', $qrData)->first(); // Assuming `data` field stores the QR code data.

        if (!$qrCode) {
            return response()->json(['message' => 'QR Code not found.'], 404); // Not Found
        }

        if ($qrCode->user_id === $complainant_id) {

            // Update the complaint's action to 'rejected'
            $complaint->action = 'rejected';
            $complaint->save();

            // Prepare the notification message
            $message = "your complaint is rejected..! you are already redeemed the QR Code.";

            // Save the notification in the database
            Notification::create([
                'user_id' => $complaint->user->id, // ID of the user
                'message' => $message,
                'image' => 'alert.png',
            ]);

            $complaint->delete();

            return response()->json(['message' => 'user already redeemed this QR Code'], 400); // Bad Request

        }

        // Step 4: Get user ID from the QR code
        $userId = $qrCode->user_id; // Adjust based on your QR code structure

        // Step 5: Subtract one point from the user_details table
        $userDetails = UserDetails::where('user_id', $userId)->first();

        if (!$userDetails) {
            return response()->json(['message' => 'User details not found.'], 404); // Not Found
        }

        // Assuming you have a points field in the user_details table
        $userDetails->point -= 1; // Subtract one point
        $userDetails->save(); // Save the changes


        // Prepare the notification message
        $message = "A complaint against you has been accepted.";

        // Save the notification in the database
        Notification::create([
            'user_id' => $userDetails->user->id, // ID of the user
            'message' => $message,
            'image' => 'alert.png',
        ]);

        $complainant_Details = UserDetails::where('user_id', $complainant_id)->first();

        if ($complainant_Details) {
            $complainant_Details->point += 1; // Add one point to the complainant
            $complainant_Details->save(); // Save the changes

            $qrCode->user_id = $complainant_Details->user_id;
            $qrCode->save();


            $message = "Complaint accepted and point awarded";

            // Save the notification in the database
            Notification::create([
                'user_id' => $complainant_Details->user_id, // ID of the user
                'message' => $message,
                'image' => 'point.png',
            ]);

            $complaint->delete();

        } else {
            return response()->json(['message' => 'Complainant details not found.'], 404); // Not Found
        }

        // Optionally, you can update the complaint's status to accepted
        $complaint->action = 'accepted';
        $complaint->save();

        // Return success response
        return response()->json(['message' => 'Complaint accepted and point deducted successfully.'], 200);
    }

    public function getAllUsers()
    {
        // Retrieve all users where the role is 'user' with their details
        $users = User::with('userdetails')->where('role', 'user')->get();

        // Map the users to include only relevant fields
        $mappedUsers = $users->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'status' => $user->status,
                'phone' => $user->phone, // Handle optional details
                'profile' => $user->userdetails->profile, // Example additional fields
                'place' => $user->userdetails->place,
                'city' => $user->userdetails->city, // Example additional fields
                'district' => $user->userdetails->district,
                'point' => $user->userdetails->point,
                'pincode' => $user->userdetails->pincode, // Example additional fields
            ];
        });

        return response()->json($mappedUsers);
    }


    public function getSuspendedUsers()
    {

        // Retrieve all users where the status is 'suspended' and role is 'user'
        $users = User::with('userdetails') // Ensure 'details' is the correct relationship name
            ->where('status', 'suspended')
            ->where('role', 'user') // Check for the role
            ->get();

        if ($users->isEmpty()) {
            return response()->json(['message' => 'No suspended users found.'], 404);
        }

        // Map the users to include only relevant fields
        $mappedUsers = $users->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'status' => $user->status,
                'phone' => $user->phone, // Handle optional details
                'profile' => $user->userdetails->profile, // Example additional fields
                'place' => $user->userdetails->place,
                'city' => $user->userdetails->city, // Example additional fields
                'district' => $user->userdetails->district,
                'point' => $user->userdetails->point,
                'pincode' => $user->userdetails->pincode,
            ];
        });

        return response()->json($mappedUsers);
    }


}
