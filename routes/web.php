<?php

use App\Http\Controllers\Admin\HospitalApprovalController;
use App\Http\Controllers\Auth\HospitalRegisterController;
use App\Http\Controllers\Auth\PatientRegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HospitalDashboardController;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\HospitalApprovalController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/service', function () {
    return view('pages.service');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register/hospital', [HospitalRegisterController::class, 'store'])->name('register.hospital');

Route::post('/register/patient', [PatientRegisterController::class, 'store'])->name('register.patient');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/hospitals/waitlist', [HospitalApprovalController::class, 'index'])->name('admin.hospitals.waitlist');
    Route::post('/hospitals/{id}/approve', [HospitalApprovalController::class, 'approve'])->name('admin.hospitals.approve');
    Route::post('/hospitals/{id}/reject', [HospitalApprovalController::class, 'reject'])->name('admin.hospitals.reject');
});

Route::middleware(['auth:hospital'])->group(function () {
    Route::get('/hospital/dashboard', [HospitalDashboardController::class, 'index'])
        ->name('hospital.dashboard');
});

Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
