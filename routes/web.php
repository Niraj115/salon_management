<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\AppointmentController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\StaffController;
use App\Http\Controllers\Backend\ReportController;

/*
|--------------------------------------------------------------------------
| FRONTEND (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::get('/', [FrontendController::class, 'home'])->name('home');

Route::get('/services', [FrontendController::class, 'services'])
    ->name('frontend.services');

Route::get('/book', [FrontendController::class, 'book'])
    ->name('frontend.book');

Route::post('/book', [FrontendController::class, 'storeBooking']);

Route::get('/booking/{appointment}', [FrontendController::class, 'bookingView'])
    ->name('frontend.booking.view');
Route::get('/team', [FrontendController::class, 'team'])
    ->name('frontend.team');


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| BACKEND (PROTECTED)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('services', ServiceController::class);
        Route::resource('staff', StaffController::class);
        Route::resource('customers', CustomerController::class);
        Route::resource('appointments', AppointmentController::class);

        Route::patch(
            'appointments/{appointment}/confirm',
            [AppointmentController::class, 'confirm']
        )->name('appointments.confirm');

        Route::patch(
            'appointments/{appointment}/cancel',
            [AppointmentController::class, 'cancel']
        )->name('appointments.cancel');

        Route::get('/reports', [ReportController::class, 'index'])
            ->name('reports.index');
});
