<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ErrorsController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\AccountController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\TravelOrderController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Auth\CustomLoginController;
use App\Http\Controllers\Auth\CustomRegistrationController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Frontend\ReservationProcessController;
use App\Http\Controllers\Frontend\TravelProcess;
use App\Http\Controllers\PDFController;
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

Route::get('/generate-permit/{reference}', [PDFController::class, 'generatePDF'])->name('permit.download');
Route::get('register', [CustomRegistrationController::class, 'index'])->name('register.custom');
Route::get('login', [CustomLoginController::class, 'index'])->name('login.custom');
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('travel-order', [TravelOrderController::class, 'index'])->name('travel');

Route::prefix('myaccount')->middleware(['auth'])->group(function () {
    Route::get('dashboard', [AccountController::class, 'dashboard'])->name('myaccount.dashboard');
    Route::get('reservation', [AccountController::class, 'reservation'])->name('myaccount.reservation');
    Route::get('profile', [AccountController::class, 'profile'])->name('myaccount.profile');
    Route::get('travel', [AccountController::class, 'travel'])->name('myaccount.travel');
    Route::get('security', [AccountController::class, 'security'])->name('myaccount.security');
});

Route::middleware(['auth'])->group(function () {
    Route::get('travel-process', [TravelProcess::class, 'index'])->name('travel_process');
    Route::get('reservation-process', [ReservationProcessController::class, 'index'])->name('reservation_process');
    Route::get('place-reservation/{reference}', [ReservationProcessController::class, 'thankyou'])->name('place_reservation');
});

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('users')->group(function () {
        Route::get('pending', [UsersController::class, 'pending'])->name('users.pending');
        Route::get('management', [UsersController::class, 'management'])->name('users.management');
        Route::get('myaccount', [UsersController::class, 'myaccount'])->name('users.myaccount');
    });
    Route::get('reports', [ReportsController::class, 'index'])->name('reports');
    Route::get('department', [DashboardController::class, 'department'])->name('department');
    Route::get('position', [DashboardController::class, 'position'])->name('position');
    Route::get('venue', [DashboardController::class, 'venue'])->name('venue');
    Route::get('item', [DashboardController::class, 'item'])->name('item');
    Route::get('vehicle', [VehicleController::class, 'index'])->name('vehicle');
    Route::prefix('reservation')->group(function () {
        Route::get('pending', [ReservationController::class, 'pending'])->name('reservation.pending');
        Route::get('history', [ReservationController::class, 'history'])->name('reservation.history');
    });

    Route::get('travel-order', [DashboardController::class, 'travel'])->name('travel');


    Route::fallback([ErrorsController::class, 'index']);
});
