<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ErrorsController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ResourceController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Frontend\AccountController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\TravelOrderController;
use App\Http\Controllers\Auth\CustomLoginController;
use App\Http\Controllers\Auth\CustomRegistrationController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishlistController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Frontend\ReservationProcessController;
use App\Http\Controllers\SignatureController;

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

Auth::routes();

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Route::get('signature/{filename}', [SignatureController::class, 'getSignatureImage'])->name('signature.image');
Route::get('register', [CustomRegistrationController::class, 'index'])->name('register.custom');
Route::get('login', [CustomLoginController::class, 'index'])->name('login.custom');
Route::get('/', [FrontendController::class, 'index'])->name('home');
// Route::get('/home', [FrontendController::class, 'index'])->name('home');
Route::get('collection', [FrontendController::class, 'categories'])->name('collection');
Route::get('collection/{category_slug}', [FrontendController::class, 'products']);
Route::get('collection/{category_slug}/{product_slug}', [FrontendController::class, 'productView']);
Route::get('reserved', [FrontendController::class, 'reservedList'])->name('reserved');

Route::middleware(['auth'])->group(function () {
    Route::get('wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
    Route::get('cart', [CartController::class, 'cart'])->name('cart');
    Route::get('reservation-process', [ReservationProcessController::class, 'index'])->name('reservation_process');
    Route::get('place-reservation/{reference}', [ReservationProcessController::class, 'thankyou'])->name('place_reservation');

});


Route::prefix('myaccount')->middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [AccountController::class, 'dashboard'])->name('myaccount.dashboard');
    Route::get('reservation', [AccountController::class, 'reservation'])->name('myaccount.reservation');
    Route::get('profile', [AccountController::class, 'profile'])->name('myaccount.profile');
    Route::get('travel', [AccountController::class, 'travel'])->name('myaccount.travel');
    Route::get('security', [AccountController::class, 'security'])->name('myaccount.security');
});

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('users')->group(function () {
        Route::get('pending', [UsersController::class, 'pending'])->name('users.pending');
        Route::get('management', [UsersController::class, 'management'])->name('users.management');
    });
    Route::get('reports', [ReportsController::class, 'index'])->name('reports');
    Route::get('category', [CategoryController::class, 'index'])->name('category');
    Route::get('product', [ResourceController::class, 'index'])->name('product');
    Route::prefix('reservation')->group(function () {
        Route::get('pending', [ReservationController::class, 'pending'])->name('reservation.pending');
        Route::get('history', [ReservationController::class, 'history'])->name('reservation.history');
    });
    Route::prefix('travelorder')->group(function () {
        Route::get('pending', [TravelOrderController::class, 'pending'])->name('travelorder.pending');
        Route::get('history', [TravelOrderController::class, 'history'])->name('travelorder.history');
    });
    Route::prefix('stocks')->group(function () {
        Route::get('stocks-in', [InventoryController::class, 'stockin'])->name('stocks.stockin');
        Route::get('stocks-history', [InventoryController::class, 'stockhistory'])->name('stocks.stockhistory');
    });
    Route::get('settings/department', [SettingsController::class, 'department'])->name('settings.department');
    Route::get('settings/position', [SettingsController::class, 'position'])->name('settings.position');

    Route::fallback([ErrorsController::class, 'index']);
});
