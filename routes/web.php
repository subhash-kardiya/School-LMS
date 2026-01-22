<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

// 🔹 Login Page (GET)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// 🔹 Login Submit (POST)
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
// Forgot Password Page (GET)
// Forgot Password
// Route::get('/forgot-password', function () {
//     return view('auth.forgot-password');
// })->name('forgot.password');

// Route::post('/forgot-password', [LoginController::class, 'forgotPassword'])
//     ->name('auth.forgot.password.post');
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('auth.forgot.password');

Route::post('/forgot-password', [LoginController::class, 'forgotPassword'])
    ->name('auth.forgot.password.post');




// OTP Verify Page
Route::get('/verify-otp', function () {
    return view('auth.otp');
})->name('otp.page');
Route::post('/verify-otp', [LoginController::class, 'verifyOtp'])->name('verify.otp');


// Change Password Page
Route::get('/change-password', function () {
    return view('auth.change-password');
})->name('change.password');

Route::post('/change-password', [LoginController::class, 'changePassword'])
    ->name('change.password.post');

// 🔹 Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// 🔹 Default Redirect
Route::get('/', function () {
    return redirect()->route('login');
});

// 🔹 Dashboards

Route::get('/admin/dashboard', function () {
    if (session('role') !== 'admin') {
        return redirect()->route('login');
    }
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/teacher/dashboard', function () {
    if (session('role') !== 'teacher') {
        return redirect()->route('login');
    }
    return view('teacher.dashboard');
})->name('teacher.dashboard');

Route::get('/student/dashboard', function () {
    if (session('role') !== 'student') {
        return redirect()->route('login');
    }
    return view('student.dashboard');
})->name('student.dashboard');

Route::get('/parent/dashboard', function () {
    if (session('role') !== 'parent') {
        return redirect()->route('login');
    }
    return view('parent.dashboard');
})->name('parent.dashboard');
