<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ErrorsController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\ResourceController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\TravelOrderController;
use App\Http\Controllers\Frontend\AccountController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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


// ->middleware('verified')

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('collection', [FrontendController::class, 'categories'])->name('collection');
Route::get('collection/{category_slug}', [FrontendController::class, 'products']);
Route::get('reservation', [FrontendController::class, 'collection'])->name('reservation_front');
Route::get('travelorder', [FrontendController::class, 'travelOrder'])->name('travelorder');
Route::get('myaccount', [AccountController::class, 'index'])->name('myaccount')->middleware('verified');


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('users', [UsersController::class, 'index'])->name('users');

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
