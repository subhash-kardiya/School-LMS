<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ParentController;

// =====================
// Authentication Routes
// =====================

    // Login
    Route::get('/login', fn() => view('auth.login'))->name('auth.login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');

    // Forgot Password
    Route::get('/forgot-password', fn() => view('auth.forgot-password'))->name('forgot.password');
    Route::post('/forgot-password', [LoginController::class, 'forgotPassword'])->name('forgot.password.post');

    // OTP Verification
    Route::get('/verify-otp', fn() => view('auth.otp'))->name('otp.page');
    Route::post('/verify-otp', [LoginController::class, 'verifyOtp'])->name('verify.otp');

    // Change Password
    Route::get('/change-password', fn() => view('auth.change-password'))->name('change.password');
    Route::post('/change-password', [LoginController::class, 'changePassword'])->name('change.password.post');

    // Logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// =====================
// Dashboard Routes
// =====================


// Role-based dashboard routes using controllers and middleware
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware(['role:teacher'])->group(function () {
    Route::get('/teacher/dashboard', [App\Http\Controllers\Admin\TeacherController::class, 'dashboard'])->name('teacher.dashboard');
});

Route::middleware(['role:student'])->group(function () {
    Route::get('/student/dashboard', [App\Http\Controllers\Admin\StudentController::class, 'dashboard'])->name('student.dashboard');
});

Route::middleware(['role:parent'])->group(function () {
    Route::get('/parent/dashboard', [App\Http\Controllers\Admin\ParentController::class, 'dashboard'])->name('parent.dashboard');
});


// =====================
// Default Redirect
// =====================
Route::get('/', fn() => redirect()->route('auth.login'));

?>
