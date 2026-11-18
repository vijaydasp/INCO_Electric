<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\Otp as Otpmodel;
use Twilio\Rest\Client;
use Exception;


class ApiController extends Controller
{
    public function register(Request $request)
    {
    
        // Validate the incoming request for user and details
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'place' => 'string|nullable',
            'city' => 'string|nullable',
            'district' => 'string|nullable',
            'phone' => 'required|string|unique:users',
            'pincode' => 'string|nullable',
            'code' => 'required|string',
        ]);
    
        // Check if validation fails
        if ($validatedData->fails()) {
            return response()->json([
                'errors' => $validatedData->errors(),
            ], 422); // Unprocessable Entity
        }
        
        $validatedData = $validatedData->validated(); // Get validated data

        $phone = $validatedData['phone']; // Access the phone
        $code = $validatedData['code']; // Access the code
        // Retrieve the OTP record for the given phone number
        $otpRecord = Otpmodel::where('phone', $phone)
        ->where('otp', $code) // Check for the code as well
        ->first();

        // If no OTP record is found, return an error
        if (!$otpRecord) {
            
            return response()->json(['message' => 'Phone number not found or OTP not requested.'], 404);
        }
    
        // Check if the OTP is expired
        if (Carbon::now()->greaterThan($otpRecord->expires_at)) {
            // OTP has expired, delete it
            $otpRecord->delete();
            return response()->json(['message' => 'OTP has expired.'], 401);
        }
    
        // Check if the provided OTP matches the stored one
        if ($otpRecord->otp == $code) {
            // OTP is valid, delete it after verification
            $otpRecord->delete();
    
            // Create the user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone'=>$request->phone,
                'password' => Hash::make($request->password),
                'status' => true, // Assuming the user is active
            ]);
    
            // Check if user was created successfully
            if ($user) {
            } else {
                return response()->json(['message' => 'User creation failed'], 500);
            }
    
            // Create the user's details
            $details = UserDetails::create([
                'user_id' => $user->id,
                'place' => $request->place,
                'city' => $request->city,
                'district' => $request->district,
                'pincode' => $request->pincode,
            ]);
    
            // Check if details were created successfully
            if ($details) {                
            } else {
                return response()->json(['message' => 'User details creation failed'], 500);
            }
    
            // Return a response with a success message and user data
            return response()->json([
                'message' => 'Registration successful!',
                'user' => $user,
                'status'=> 'success'
            ], 201);
        } else {
            // If OTP is invalid, log and return an error response
            return response()->json(['message' => 'Invalid OTP.'], 401);
        }
    }
    
    public function login(Request $request)
{

    // Check if the input is an email or phone number
    $loginField = filter_var($request->input('email_or_phone'), FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

    // Validate the incoming request based on the login field
    $request->validate([
        'email_or_phone' => 'required|string',
        'password' => 'required|string',
    ]);

    // Attempt to log the user in using the appropriate field (email or phone)
    if (Auth::attempt([$loginField => $request->input('email_or_phone'), 'password' => $request->password])) {
        $user = Auth::user();

   
        // Generate the authentication token
        $token = $user->createToken('Inco')->plainTextToken;
        return response()->json([
            'user' => $user,
            'token' => $token,
            'message' => 'Login successfully'
        ], 200);
    }

    // If login attempt fails
    return response()->json(['message' => 'Login failed: Invalid credentials'], 401);
}

    public function logout(Request $request)
    {
        try {
            // Revoke the user's token
            $user = auth()->user();
            $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

            // Return a success response
            return response()->json(['message' => 'Logged out successfully.'], 200);
        } catch (\Exception $e) {
            // Return an error response
            return response()->json(['message' => 'Error during logout.'], 500);
        }
    }
    public function getProfile()
    {

        // Find the user 
        $user = auth()->user();

        // Check if the user exists
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Load the related user details
        $userDetails = $user->userdetails;
        // Combine user and user details into one array
        // $image = asset('storage/' . $userDetails->profile);

        $profileData = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone'=>$user->phone,
            'role' => $user->role,
            'status' => $user->status,
            'place' => $userDetails ? $userDetails->place : null,
            'city' => $userDetails ? $userDetails->city : null,
            'district' => $userDetails ? $userDetails->district : null,
            'pincode' => $userDetails ? $userDetails->pincode : null,
            'profile' => $userDetails ? $userDetails->profile : null,
            // 'profile' => $image
        ];
        // Return the combined profile data
        return response()->json($profileData, 200);
    }

    public function editProfile(Request $request)
    {

        // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'place' => 'required|string',
            'city' => 'required|string',
            'district' => 'required|string',
            'pincode' => 'required|string',
        ]);

        // Get the currently authenticated user
        $user = auth()->user();
        // Check if user is authenticated
        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }

        // Update user name in the users table
        $user->update([
            'name' => $validatedData['name'],
        ]);

        // Check if user details exist
        if (!$user->userdetails) {
            return response()->json(['message' => 'User details not found.'], 404);
        }

        // Update details in the userdetails table
        $user->userdetails->update([
            'place' => $validatedData['place'],
            'city' => $validatedData['city'],
            'district' => $validatedData['district'],
            'pincode' => $validatedData['pincode'],
        ]);

        return response()->json([
            'message' => 'Profile updated successfully.',
            'user' => $user,
            'details' => $user->details
        ], 200);
    }


public function updateProfileImage(Request $request)
{
    // Validate incoming request data
    $validator = Validator::make($request->all(), [
        'image' => 'required|image', // Adjust max size as needed
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
    }

    // Get the currently authenticated user
    $user = auth()->user();

    // Check if the request has an image file
    if ($request->hasFile('image')) {
        // Delete the old profile image if it exists
        if ($user->userdetails->profile) {
            $oldImagePath = public_path($user->userdetails->profile);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Delete the old image file
            }
        }

        // Retrieve the uploaded file
        $file = $request->file('image');

        // Define the destination path
        $destinationPath = public_path('uploads/users');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true); // Create the directory if it doesn't exist
        }

        // Generate a unique file name
        $imageName = time() . '_' . $file->getClientOriginalName();
        
        // Store the image in 'public/uploads/users' directory
        $file->move($destinationPath, $imageName);

// Update the user details with the new profile image path
$user->userdetails()->update(['profile' => 'uploads/users/' . $imageName]);

// Return the relative path for the stored image
$imagePath = 'uploads/users/' . $imageName;

return response()->json([
    'message' => 'Profile image updated successfully',
    'image' => $imagePath
], 200);
    } else {
        return response()->json(['message' => 'No image found.'], 400);
    }
}

    public function changeEmail(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email|unique:users,email,' // Validate email and ensure it's unique for the given user ID
        ]);

        $user = auth()->user();

        // Update the user's email
        $user->email = $request->email;
        $user->save();

        // Return a success response
        return response()->json([
            'message' => 'Email updated successfully',
            'user' => $user,
        ], 200);
    }
    public function changepassword(Request $request)
    {
        // Validate the request data
        $request->validate([
            'current_password' => 'required|string', // Ensure current password is required and is a string
            'new_password' => 'required|string', // New password should have a minimum length and should be confirmed
        ]);
        $user = auth()->user();
    
        // Check if the provided current password matches the user's actual password
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['message' => 'Current password does not match.']);
        }
    
        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json([
            'message' => 'Password updated successfully.',
            'status'=>'success'
        ]);
    }
    
        public function deleteAccount()
{
    // Find the authenticated user
    $user = auth()->user();

    if ($user) {
        // Delete the user's profile image from storage if it exists
        if ($user->profile_image) {
            Storage::disk('public')->delete("uploads/users/{$user->profile_image}");
        }

        // Delete user details if they exist
        if ($user->details) {
            $user->details()->delete();
        }

        // Delete the user from the database
        $user->delete();

        return response()->json(['message' => 'Account deleted successfully'], 200);
    }

    return response()->json(['error' => 'User not authenticated.'], 401);
}


}
