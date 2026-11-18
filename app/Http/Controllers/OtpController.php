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
use Illuminate\Support\Facades\Http;


class OtpController extends Controller
{
    public function sendOtp(Request $request)
    {
        // Validate the phone number input
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string',
            'value' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid phone number'], 400);
        }

        if ($request->input('value') == true) {
            $phone = $request->phone;

            // Generate a random 4-digit OTP
            $otpCode = rand(1000, 9999);

            // Set OTP expiration time (e.g., 5 minutes from now)
            $otpExpiry = Carbon::now()->addMinutes(3);

            // Store the OTP and its expiry time in the database
            \DB::table('otps')->insert([
                'otp' => $otpCode,
                'expires_at' => $otpExpiry,
                'phone' => $phone
            ]);

            // Send the OTP via Twilio
            try { 
                $this->sendSmsViaFast2SMS($phone, $otpCode);

                return response()->json([
                    'status'=>'success',
                    'message' => 'OTP sent successfully',
                    'phone' => $phone,
                    'otp' => $otpCode,
                    'otp_expiry' => $otpExpiry->toDateTimeString(),
                ], 200);

            } catch (Exception $e) {
                return response()->json([
                    'message' => 'Failed to send OTP. Please try again.',
                    'error' => $e->getMessage()
                ], 500);
            }
        } else {
            $phone = $request->phone;

            $phoneExists = User::where('phone', $request->input('phone'))->exists();
            if ($phoneExists) {
                return response()->json(['message' => 'Phone number already exists']);
            } else {
                $otpCode = rand(1000, 9999);

                // Set OTP expiration time (e.g., 5 minutes from now)
                $otpExpiry = Carbon::now()->addMinutes(3);

                // Store the OTP and its expiry time in the database
                \DB::table('otps')->insert([
                    'otp' => $otpCode,
                    'expires_at' => $otpExpiry,
                    'phone' => $phone
                ]);

                try {
                    $this->sendSmsViaFast2SMS($phone, $otpCode);

                    return response()->json([
                        'status'=>'success',
                        'message' => 'OTP sent successfully',
                        'phone' => $phone,
                        'otp' => $otpCode,
                        'otp_expiry' => $otpExpiry->toDateTimeString(),
                    ], 200);

                } catch (Exception $e) {
                    return response()->json([
                        'message' => 'Failed to send OTP. Please try again.',
                        'error' => $e->getMessage()
                    ], 500);
                }
            }
        }
    }

    protected function sendSmsViaFast2SMS($phone, $otpCode)
    {
        $fields = [
            "variables_values" => $otpCode, // OTP to send
            "route" => "otp",
            "numbers" => $phone, // Phone number to send OTP
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2?authorization=SjAJ57xmifR4GXhtWFuwHE2y0vMYqrplNZKTDk8eOVb3QoaPBnDtPYFA0goMs5Qi12Z9HBzNhGnLalCU&route=otp&variables_values=$otpCode&flash=0&numbers=$phone",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($fields),
            CURLOPT_HTTPHEADER => [
                "authorization: SjAJ57xmifR4GXhtWFuwHE2y0vMYqrplNZKTDk8eOVb3QoaPBnDtPYFA0goMs5Qi12Z9HBzNhGnLalCU", // Replace with your actual API key
                "accept: */*",
                "cache-control: no-cache",
                "content-type: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        // Check for cURL errors and handle the response
        if ($err) {
            throw new \Exception('SMS could not be sent.'); // Handle as needed
        } else {
            $responseData = json_decode($response, true);
            if (!isset($responseData['return']) || $responseData['return'] != true) {
                // Handle errors based on the response
                $errorMessage = isset($responseData['message']) ? $responseData['message'] : 'Unknown error';
                throw new \Exception('Failed to send OTP: ' . $errorMessage);
            }
        }
    }


    public function verifyOtp(Request $request)
    {
        // Validate the request input
        $validatedData = Validator::make($request->all(), [
            'phone' => 'required|string|max:15',
            'code' => 'required|string',
        ]);
        // If you want to log errors in case the validation fails
        if ($validatedData->fails()) {
        }
        $validatedData = $validatedData->validated();
        $phone = $request->phone;
        $code = $request->code;

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
            return response()->json([
                'message' => 'OTP verified successfully.',
                'status' => 'success'
            ], 200);
        } else {
            return response()->json(['message' => 'Invalid OTP.'], 401);
        }
    }


    public function forgotPassword(Request $request)
    {
        // Validate the request input
        $request->validate([
            'phone' => 'required|string|max:15',
        ]);

        $phone = $request->phone;

        // Check if the phone number exists in the userdetails table
        $userDetails = UserDetails::where('phone', $phone)->first();

        if (!$userDetails) {
            return response()->json(['message' => 'Phone number not found.'], 404);
        }

        // Get the associated user ID
        $userId = $userDetails->user_id;
        $user = User::find($userId);

        if ($user) {

            // Generate a random 4-digit OTP
            $otpCode = rand(1000, 9999);

            // Set OTP expiration time (e.g., 5 minutes from now)
            $otpExpiry = Carbon::now()->addMinutes(3);

            // Store the OTP and its expiry time in the database
            \DB::table('otps')->insert([
                'otp' => $otpCode,
                'expires_at' => $otpExpiry,
                'phone' => $phone
            ]);
            // Generate and send OTP to the phone number
            // Send the OTP via Twilio
            try {
                $message = "INCO verification code is: $otpCode";
                $this->sendSmsViaTwilio($phone, $message); // Using Twilio to send the SMS

                return response()->json([
                    'message' => 'OTP sent successfully',
                    'phone' => $phone,
                    'otp_expiry' => $otpExpiry->toDateTimeString(),
                ], 200);

            } catch (Exception $e) {
                return response()->json([
                    'message' => 'Failed to send OTP. Please try again.',
                    'error' => $e->getMessage()
                ], 500);
            }
        }
    }
    public function resetPassword(Request $request)
    {

        // Validate the request input
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string|max:15',
            'new_password' => 'required|string|', // Ensure confirmation is included
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // Return validation errors
        }

        // Validation passed, proceed with password reset
        $validatedData = $validator->validated();

        // Extract phone and new_password from validated data
        $phone = $validatedData['phone'];
        $newPassword = $validatedData['new_password'];

        // Check if the phone number exists in the userdetails table
        $user = User::where('phone', $phone)->first();
        // $userDetails = UserDetails::where('phone', $phone)->first(); // Assuming 'phone' is the correct field

        if (!$user) {
            return response()->json(['message' => 'Phone number not found.'], 404); // Return 404 for missing phone
        }

        // Get the associated user ID and find the user
        $userId = $user->id;
        // $user = User::find($userId);

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404); // Return 404 for missing user
        }

        // Update the password
        $user->password = Hash::make($newPassword);
        $user->save();

        return response()->json([
            'message' => 'Password changed successfully.',
            'status' => 'success'
        ], 200);
    }


}
