<?php

use App\Http\Controllers\PatientExportController;
use App\Http\Controllers\Admin\HospitalApprovalController;
use App\Http\Controllers\Auth\HospitalRegisterController;
use App\Http\Controllers\Auth\PatientRegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HospitalDashboardController;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\HospitalApprovalController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
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

// Additional Appointment Routes

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/hospitals', [HospitalApprovalController::class, 'index'])->name('admin.hospitals');
    Route::get('/hospitals/waitlist', [HospitalApprovalController::class, 'pending'])->name('admin.waitlist');
    Route::post('/hospitals/{id}/approve', [HospitalApprovalController::class, 'approve'])->name('admin.hospitals.approve');
    Route::post('/hospitals/{id}/reject', [HospitalApprovalController::class, 'reject'])->name('admin.hospitals.reject');
});

Route::middleware(['auth:hospital'])->group(function () {
    Route::get('/hospital/dashboard', [HospitalDashboardController::class, 'index'])
        ->name('hospital.dashboard');
    Route::get('/hospital/doctors', [HospitalDashboardController::class, 'doctors'])
        ->name('hospital.doctors');
    Route::post('/hospital/doctors/register', [DoctorController::class, 'store'])
        ->name('hospital.doctors.register');
    Route::delete('/hospital/doctors/{id}', [DoctorController::class, 'destroy'])
        ->name('hospital.doctors.delete');
    Route::get('/hospital/departments', [DepartmentController::class, 'index'])
        ->name('hospital.departments');
    Route::post('/hospital/departments/register', [DepartmentController::class, 'store'])
        ->name('hospital.departments.register');
    Route::resource('departments', DepartmentController::class);
    // Doctor Routes
    Route::resource('doctors', DoctorController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [DashboardController::class, 'profile'])->name('patient.profile.settings');
    Route::put('/profile/update', [PatientRegisterController::class, 'updateProfile'])->name('patient.updateProfile');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments/create/', [AppointmentController::class, 'store'])->name('appointments.create.new');


    Route::get('/profile/export-users/excel', [PatientExportController::class, 'export'])->name('patient.export.excel');
    // Route::get('/appointments/create', [AppointmentController::class, 'index'])->name('appointments.create');
    // Route::get('/appointments/{appointment}/confirm', [AppointmentController::class, 'confirm'])
    //     ->name('appointments.confirm');
    //
    // Route::get('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancel'])
    //     ->name('appointments.cancel');
    // Appointment Routes
    // Route::resource('appointments', AppointmentController::class);
    // Route::resource('appointments', AppointmentController::class);
});
