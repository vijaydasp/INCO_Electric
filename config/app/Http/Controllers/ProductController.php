<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\RedeemedProduct;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Events\NotificationSent;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function get()
    {

        // Get all products from the database
        $products = Product::all();

        // Return a JSON response with all products
        return response()->json($products, 200);
    }
  public function store(Request $request)
{
    // Validate the incoming request data
    $validator = Validator::make($request->all(), [
        'product_info' => 'required|string|max:255',
        'product_image' => 'required|image|mimes:jpeg,png,jpg,gif', // Validate image upload
        'point' => 'required|integer|min:0',
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors(),
        ], 422); // Unprocessable Entity
    }

    // Handle the image upload
    if ($request->hasFile('product_image')) {
        $image = $request->file('product_image');
        
        // Define the path where the image should be stored
        $destinationPath = public_path('uploads/products');
        
        // Create the directory if it doesn't exist
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }
        
        // Store the image in 'public/uploads/products' and get the path
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move($destinationPath, $imageName);
        
        // Save the relative path for database storage
        $imagePath = 'uploads/products/' . $imageName;
    } else {
        return response()->json(['message' => 'Product image is required.'], 422);
    }

    // Create a new product
    $product = Product::create([
        'product_info' => $request->input('product_info'),
        'product_image' => $imagePath,
        'point' => $request->input('point'),
    ]);

    return response()->json(['message' => 'Product added successfully', 'product' => $product], 201);
}

public function update(Request $request, $id)
{
    // Find the product by its ID
    $product = Product::findOrFail($id);

    // Validate incoming request data
    $request->validate([
        'product_info' => 'required|string|max:255',
        'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'point' => 'required|integer|min:0',
    ]);

    // Store the new image if provided
    if ($request->hasFile('product_image')) {
        // Delete the old image if it exists
        if ($product->product_image && file_exists(public_path($product->product_image))) {
            unlink(public_path($product->product_image));
        }

        // Handle the image upload
        $image = $request->file('product_image');
        
        // Define the destination path
        $destinationPath = public_path('uploads/products');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }
        
        // Save the new image
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move($destinationPath, $imageName);
        
        // Update product image path
        $product->product_image = 'uploads/products/' . $imageName;
    }

    // Update product details
    $product->product_info = $request->input('product_info');
    $product->point = $request->input('point');

    $product->save();

    return response()->json(['message' => 'Product updated successfully', 'product' => $product], 200);
}

public function destroy($id)
{
    // Find the product by its ID
    $product = Product::findOrFail($id);

    // Delete the product image from public storage if it exists
    if ($product->product_image && file_exists(public_path($product->product_image))) {
        unlink(public_path($product->product_image));
    }

    // Delete the product from the database
    $product->delete();

    return response()->json(['message' => 'Product deleted successfully'], 200);
}


    public function redeemProduct(Request $request)
    {
        // Validate the request data
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'address' => 'nullable|string',
        ]);


        // Get the authenticated user
        $user = Auth::user();

        if ($user->status !== 'suspended') {

            // Get the product details
            $product = Product::find($request->product_id);

            // Check if the product exists
            if (!$product) {
                return response()->json(['message' => 'Product not found.'], 404);
            }

            // Get the user's details
            $userDetails = UserDetails::where('user_id', $user->id)->first();

            // Check if the user has enough points to redeem the product
            if ($userDetails->point < $product->point) {
                return response()->json(['message' => 'Not enough points to redeem this product.'], 400);
            }

            // Deduct points from user's details
            $userDetails->point -= $product->point;
            $userDetails->save();

            // Create the redeemed product record
            $redeemedProduct = RedeemedProduct::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'address' => $request->address,
                'status' => 'pending', // Set default status to 'pending'
            ]);

            // Create notification for the user
            $notificationMessage = "You have redeemed the product: {$product->product_info}.";
            \DB::table('notifications')->insert([
                'user_id' => $user->id,
                'message' => $notificationMessage,
                'image' => $product->product_image,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json([
                'message' => 'Product redeemed successfully.',
                'redeemed_product' => $redeemedProduct,
                'status' => 'success'
            ], 201);

        } else {
            return response()->json([
                'message' => 'Your account has been suspended..!',
                'status' => 'suspended'
            ], 200);
        }
    }

    public function updateStatus(Request $request, $id)
    {

        // Validate the request (optional)
        $request->validate([
            'status' => 'required|string|in:shipped',
        ]);

        // Find the product by ID
        $product = RedeemedProduct::findOrFail($id);

        $user = $product->user;
        $product->status = 'shipped';
        $product->save();

        // Create notification for the user
        $notificationMessage = "Your redeemed product {$product->product_info} is shipped.";
        \DB::table('notifications')->insert([
            'user_id' => $user->id,
            'message' => $notificationMessage,
            'image' => $product->product_image,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Return a response
        return response()->json([
            'message' => 'Product status updated successfully',
            'product' => $product,
        ]);

    }


    public function changeAddress(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'address' => 'required|string|max:255', // Validate address as a string
        ]);

        // Find the product by its ID
        $product = RedeemedProduct::findOrFail($id);

        // Check if the product's status is 'pending'
        if ($product->status == 'pending') {
            // Update the address
            $product->address = $request->address;
            $product->save();

            // Return a success response
            return response()->json([
                'message' => 'Address changed successfully',
                'product' => $product,
            ], 200);
        } else {
            // Return an error response if the product is already shipped
            return response()->json([
                'message' => 'Product is shipped. Address cannot be changed.',
            ], 400); // Be sure to return the response here
        }
    }

    public function RedeemedProduct()
    {
        // Ensure the user is authenticated
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'User not authenticated.'], 401); // Unauthorized
        }

        // Fetch redeemed products for the authenticated user, including product details
        $redeemed_products = RedeemedProduct::with('product') // Eager load the product relationship
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Format the response
        $formatted_redeemed_products = $redeemed_products->map(function ($redeemed) {
            return [
                'id' => $redeemed->id,
                'user_id' => $redeemed->user_id,
                'product_id' => $redeemed->product_id,
                'address' => $redeemed->address,
                'status' => $redeemed->status,
                'created_at' => $redeemed->created_at,
                'updated_at' => $redeemed->updated_at,
                'product_info' => $redeemed->product ? $redeemed->product->product_info : 'N/A', // Adjust based on your Product model
                'product_image' => $redeemed->product ? $redeemed->product->product_image : null, // Adjust based on your Product model
                'point' => $redeemed->product ? $redeemed->product->point : 0, // Adjust based on your Product model
            ];
        });

        // Return the formatted response as JSON
        return response()->json($formatted_redeemed_products, 200);
    }


    public function getCounts()
    {
        // Get the total count of redeemed products
        $totalProducts = RedeemedProduct::count();

        $redeemedRequests = RedeemedProduct::where('status', 'pending')->count();

        $activeUsers = User::where('status', 'active')
        ->where('role', 'user')
        ->count();

        $products = Product::count();

        $complaints = Complaint::where('action', 'pending')->count();

        // Get the count of redeemed products for each product_id
        $productCounts = RedeemedProduct::select('product_id')
            ->selectRaw('COUNT(*) as count') // Count of each product_id
            ->groupBy('product_id') // Group by product_id
            ->get();

        // Assuming $productCounts contains product_id, count, product_info, and product_image
        $productPercentages = [];
        foreach ($productCounts as $product) {
            // Calculate the percentage for each product
            $percentage = $product->count / $totalProducts;

            // Store the product details in an array
            $productPercentages[] = [
                'product_id' => $product->product->id,
                'product_info' => $product->product->product_info, // Map product_info
                'product_image' => $product->product->product_image, // Map product_image
                'percentage' => round($percentage, 2), // Round the percentage to 2 decimal places
            ];
        }

        // Return the percentages as a JSON response
        return response()->json([
            'product_percentages' => $productPercentages,
            'redeemedRequests' => $redeemedRequests,
            'activeUsers' => $activeUsers,
            'products' => $products,
            'complaints' => $complaints,
        ], 200);
    }

    public function getRedeemRequests()
    {
        // Retrieve all redeemed products with status 'pending', including user and product details
        $requests = RedeemedProduct::with(['user', 'product']) // Eager load user and product relationships
            ->where('status', 'pending')
            ->get();

        // Map through the requests to format the response
        $redeem_requests = $requests->map(function ($redeemed) {
            return [
                'id' => $redeemed->id,
                'user_id' => $redeemed->user_id,
                'user_name' => $redeemed->user->name, // Assuming 'name' field in users table
                'product_id' => $redeemed->product_id,
                'product_info' => $redeemed->product->product_info, // Assuming 'name' field in products table
                'product_image' => $redeemed->product->product_image, // Assuming 'image' field in products table
                'address' => $redeemed->address,
                'created_at' => $redeemed->created_at,
                'updated_at' => $redeemed->updated_at,
            ];
        });

        // Return the formatted response as JSON
        return response()->json($redeem_requests, 200);
    }



    public function getRedeemHistory()
    {
        // Fetch all redeemed products with status 'shipped', including related user and product data
        $history = RedeemedProduct::with(['user', 'product']) // Eager load user and product relationships
            ->where('status', 'shipped')
            ->get();

        // Map through the history to format the response
        $redeem_history = $history->map(function ($redeemed) {
            return [
                'id' => $redeemed->id,
                'user_id' => $redeemed->user_id,
                'user_name' => $redeemed->user->name, // Assuming 'name' field in users table
                'product_id' => $redeemed->product_id,
                'product_info' => $redeemed->product->product_info, // Assuming 'name' field in products table
                'product_image' => $redeemed->product->product_image, // Assuming 'image' field in products table
                'address' => $redeemed->address,
                'created_at' => $redeemed->created_at,
                'updated_at' => $redeemed->updated_at,
            ];
        });

        // Return the formatted response as JSON
        return response()->json($redeem_history, 200);
    }

}
