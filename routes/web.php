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
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| FRONTEND (PUBLIC)
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontendController::class, 'home'])->name('home');

Route::get('/about', [FrontendController::class, 'about'])
    ->name('frontend.about');

Route::get('/services', [FrontendController::class, 'services'])
    ->name('frontend.services');

Route::get('/team', [FrontendController::class, 'team'])
    ->name('frontend.team');

Route::get('/book', [FrontendController::class, 'book'])
    ->name('frontend.book');

Route::post('/book', [FrontendController::class, 'storeBooking']);

Route::get('/booking/{appointment}', [FrontendController::class, 'bookingView'])
    ->name('frontend.booking.view');

/*
|--------------------------------------------------------------------------
| FRONTEND CONTACT
|--------------------------------------------------------------------------
*/

Route::get('/contact', [ContactController::class, 'create'])
    ->name('contact.create');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'loginForm'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerForm'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');


/*
|--------------------------------------------------------------------------
| ADMIN PANEL (PROTECTED)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->prefix('admin')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Resources
        Route::resource('services', ServiceController::class);
        Route::resource('staff', StaffController::class);
        Route::resource('customers', CustomerController::class);
        Route::resource('appointments', AppointmentController::class);

        // Appointment Actions
        Route::patch(
            'appointments/{appointment}/confirm',
            [AppointmentController::class, 'confirm']
        )->name('appointments.confirm');

        Route::patch(
            'appointments/{appointment}/cancel',
            [AppointmentController::class, 'cancel']
        )->name('appointments.cancel');

        // Reports
        Route::get('/reports', [ReportController::class, 'index'])
            ->name('reports.index');

        /*
        |--------------------------------------------------------------------------
        | ADMIN INBOX
        |--------------------------------------------------------------------------
        */

        // View Inbox
        Route::get('/inbox', [ContactController::class, 'index'])
            ->name('contacts.index');

        // Delete Message
        Route::delete('/contacts/{contact}', 
            [ContactController::class, 'destroy']
        )->name('contacts.destroy');
    });