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
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Middleware\AdminMiddleware;

use App\Http\Controllers\ExcelExportController;

use App\Http\Controllers\PdfExportController;

use App\Http\Controllers\SmsController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/FAQs', function () {
    return view('pages.FAQs');
})->name('FAQs');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

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
    Route::post('/hospitals/{id}/delete', [HospitalApprovalController::class, 'destroy'])->name('admin.hospitals.delete');
    Route::get('/doctors', [HospitalApprovalController::class, 'doctors'])->name('admin.doctors');
    Route::post('/doctors/{id}/delete', [HospitalApprovalController::class, 'destroyDoctor'])->name('admin.doctor.delete');
    Route::get('/departments', [DepartmentController::class, 'departments'])->name('admin.departments');
    Route::post('/departments/{id}/delete', [DepartmentController::class, 'destroyDepartment'])->name('admin.department.delete');
    Route::get('/settings', [AdminSettingsController::class, 'index'])->name('admin.settings');
    Route::post('/settings/update', [AdminSettingsController::class, 'createOrUpdate'])->name('admin.settings.change');
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
    Route::put('/profile/update/username', [PatientRegisterController::class, 'updateUsername'])->name('patient.updateUsername');
    Route::delete('/profile/delete', [PatientRegisterController::class, 'destroy'])->name('patient.delete');
    Route::get('/dashboard', [DashboardController::class, 'search'])->name('dashboard');
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::get('/appointments/index', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::post('/appointments/create/', [AppointmentController::class, 'store'])->name('appointments.create.new');
    Route::get('/my-appointments', [AppointmentController::class, 'myAppointments'])
        ->name('myAppointments');
    Route::put('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancel'])
        ->name('appointments.cancel');
    Route::get('/appointments/{appointment}/edit', [AppointmentController::class, 'edit'])
        ->name('appointments.edit');

    Route::put('/appointments/reappointment', [AppointmentController::class, 'reappointment'])
        ->name('appointments.create.reappointment');

    Route::get('/profile/export/excel', [ExcelExportController::class, 'exportUserAppointments'])->name('patient.export.excel');

    Route::get('profile/export-users/pdf', [PdfExportController::class, 'generatePDF'])->name("export.pdf");

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

Route::get('/test', [DashboardController::class, 'test'])->name('test');
Route::middleware(['auth:doctor'])->group(function () {
    Route::get('/doctor/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');
    Route::get('/doctors/appointments', [DoctorController::class, 'getTodaysAppointments']);
    Route::put('/doctors/appointments/complete', [AppointmentController::class, 'complete'])
        ->name('appointments.complete');

    Route::get('/doctors/appointments/{appointment}/finish', [AppointmentController::class, 'finish'])
        ->name('appointments.finish');
});

Route::get('/pdf', function () {
    return view('pdf.example');
});

Route::get('/sms/send', [SmsController::class, 'sendSms']);
Route::get('/sms/sent', [SmsController::class, 'getSentMessages']);
Route::get('/sms/received', [SmsController::class, 'getReceivedMessages']);
Route::get('/sms/pending', [SmsController::class, 'getPendingMessages']);
