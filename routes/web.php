<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ContactController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use Illuminate\Support\Facades\Artisan;

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage link created successfully!';
});

Route::get('/', function () {
    return view('welcome');
});

Route::post('/contact-enquiry', [ContactController::class, 'send'])->name('contact.send');
Route::get('/privacy-policy', function () {
    return view('privacypolicy');
});
Route::get('/terms&conditions', function () {
    return view('terms');
});

Route::get('/clear/config', function () {
    // Clear the application cache
    Artisan::call('config:clear');
    Artisan::call('cache:clear');

    // Clear the route cache
    Artisan::call('route:clear');

    // Clear the configuration cache and recache
    Artisan::call('config:cache');

    return 'Application cache cleared, route cache cleared, and configuration cache refreshed.';
});

Route::get('/contactus', function () {
    return view('contactus');
});




Route::prefix('admin/inco')->group(function () {
    Route::get('/login', [WebController::class, 'adminLogin'])->name('admin.login');
    Route::post('/login', [WebController::class, 'adminLoginSubmit'])->name('admin.login.submit');
    
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [WebController::class, 'adminDashboard'])->name('admin.dashboard');
        Route::get('/users', [WebController::class, 'adminUsers'])->name('admin.users');

        Route::get('/redeems', [WebController::class, 'adminRedeems'])->name('admin.redeems');


        Route::get('/users', [webController::class, 'userindex'])->name('admin.users');
        Route::get('/users/search', [WebController::class, 'userSearch'])->name('admin.users.search');
        Route::get('/users/{id}', [WebController::class, 'show'])->name('admin.users.show');
        Route::post('/users/{id}/points', [webController::class, 'updatePoints'])->name('admin.users.updatePoints');
        Route::post('/users/{id}/suspend', [webController::class, 'suspendUser'])->name('admin.users.suspend');
        Route::get('/users/{id}/redeemed-products/filter', [WebController::class, 'filter'])->name('admin.redeems.filter');

        Route::get('/redeems', [WebController::class, 'pendingRedeems'])->name('admin.redeems');
        Route::post('/redeems/{id}/ship', [WebController::class, 'markAsShipped'])->name('admin.redeems.ship');

        Route::get('/redeems/{redeem}/view/shipping-slip', [webController::class, 'shippingSlipView'])->name('admin.redeems.pdf');

        Route::post('/redeems/{redeem}/shipping-slip', [webController::class, 'generateSlip'])->name('admin.redeems.generate-slip');

        Route::get('/redeem-history', [WebController::class, 'redeemHistory'])->name('admin.redeemhistory');
        Route::get('/admin/users/{user}/qr-history', [WebController::class, 'qrHistory'])->name('admin.users.qr-history');

        Route::get('/qr-create', [webController::class, 'getQrPage'])->name('admin.qr.page');
        Route::get('/qr-pdfs', [webController::class, 'getPdf'])->name('admin.qr.index');
        Route::get('/qr-pdfs/2', [webController::class, 'getPdf2'])->name('admin.qr.index2');
        Route::get('/qr-pdfs/download/{id}', [webController::class, 'download'])->name('admin.qr.download');
        Route::get('/qr-pdfs/download-all', [webController::class, 'downloadAll'])->name('admin.qr.downloadAll');
        Route::delete('/qr-pdfs/clear-all', [webController::class, 'clearAll'])->name('admin.qr.clearAll');


        Route::post('/qr/create', [QrController::class, 'createSingleQrcode'])->name('admin.qr.create.single');
        Route::post('/qr/create/double', [QrController::class, 'createdoubleQrcode'])->name('admin.qr.create.double');


    });



});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('admin.login');
})->name('logout');