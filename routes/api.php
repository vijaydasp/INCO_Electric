<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\QrController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OtpController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('test', function () {
    return response()->json(['message' => 'API is working!']);
});

Route::post('/send-otp', [OtpController::class, 'sendOtp']);
Route::post('/verify-otp', [OtpController::class, 'verifyOtp']);
Route::post('/forgot-password', [OtpController::class, 'forgotPassword']);
Route::post('/reset-password', [OtpController::class, 'resetPassword']);
Route::post('register',[ApiController::class,'register'])->name('register');

Route::post('login',[ApiController::class,'login'])->name('login');

// This route is protected by the auth:sanctum middleware
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('logout', [ApiController::class, 'logout']);
    //profile
    Route::get('/profile', [ApiController::class, 'getProfile']);
    Route::put('/edit-profile', [ApiController::class, 'editProfile']);
    Route::post('/update-profile-image', [ApiController::class, 'UpdateProfileImage']);
    Route::post('/users/change-email', [ApiController::class, 'changeEmail']);
    //admin view users
    Route::get('/admin/users/all',[AdminController::class,'getAllUsers']);
    Route::get('/admin/users/suspended',[AdminController::class,'getSuspendedUsers']);

    // qrcoderoutes
    Route::post('/create-qrcode', [QrController::class,'createQrcode']);
    Route::get('/get-pdf',[QrController::class,'getpdf']);
    Route::delete('/delete/pdf/{id}',[QrController::class,'deletePdf']);
    Route::delete('/deleteAll',[QrController::class,'clearAllPdfs']);

    Route::post('/get-points', [QrController::class, 'redeemPoints']);
    Route::get('/points', [QrController::class, 'getPoint']);
    
    Route::get('/user/earned-points', [QrController::class, 'getEarnedPoints']);

    //get products
    Route::get('/products', [ProductController::class, 'get']);
    Route::post('/add-product', [ProductController::class, 'store']);
    Route::post('/edit-product/{id}', [ProductController::class, 'update']);
    Route::delete('/delete-product/{id}', [ProductController::class, 'destroy']);
  //notification
    Route::get('/notifications', [QrController::class, 'getUserNotifications']);
    //redeem product
    Route::post('/redeem-product', [ProductController::class, 'redeemProduct']);
    //change delivery address
    Route::post('/change-delivery-address/{id}', [ProductController::class, 'changeAddress']);
    //admin change status shipped
    Route::post('/product/{id}/status', [ProductController::class, 'updateStatus']);
    
    Route::get('/redeem/requests',[ProductController::class,'getRedeemRequests']);
    Route::get('/redeem/history',[ProductController::class,'getRedeemHistory']);

    //redeem history user
    Route::get('/user/redeemed/products',[ProductController::class,'RedeemedProduct']);
    //get product requirement
    Route::get('/counts',[ProductController::class,'getCounts']);
    //banner
    Route::get('get/banners',[AdminController::class,'getBanners']);
    Route::post('create/banner',[AdminController::class,'createBanner']);
    Route::post('edit/banner/{id}',[AdminController::class,'editBanner']);
    Route::delete('delete/banner/{id}',[AdminController::class,'deleteBanner']);

    //suspend user
    Route::put('toggle-status/{id}',[AdminController::class,'toggleStatus']);
    // Route::put('remove-suspend-user/{id}',[AdminController::class,'remove_suspend']);

    //complaints
    Route::post('/complaint',[QrController::class,'compalints']);
    Route::get('/admin/complaints',[AdminController::class,'getCompalints']);
    Route::post('/admin/complaints/{id}/reject',[AdminController::class,'rejectComplaints']);
    Route::post('/admin/complaints/{id}/accept',[AdminController::class,'acceptComplaints']);

    //change password
    Route::post('/change-password', [ApiController::class, 'changePassword']);
    Route::delete('delete-account',[ApiController::class,'deleteAccount']);

});

