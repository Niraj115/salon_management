<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\AppointmentController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\StaffController;
use App\Http\Controllers\Backend\CustomerController;

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// Protected Routes
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Services
    Route::resource('services', ServiceController::class);

    // Staff
    Route::resource('staff', StaffController::class);
    
     Route::resource('customers', CustomerController::class);


    // Appointments
    Route::resource('appointments', AppointmentController::class);

    // 📅 Appointment Calendar
    Route::get(
        'appointments-calendar',
        [AppointmentController::class, 'calendar']
    )->name('appointments.calendar');

    // Appointment Status
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
});
