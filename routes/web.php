<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

// =====================
// Authentication Routes
// =====================
Route::prefix('auth')->group(function () {
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
});

// =====================
// Dashboard Routes
// =====================
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        if (session('role') !== 'admin') return redirect()->route('auth.login');
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::prefix('teacher')->group(function () {
    Route::get('/dashboard', function () {
        if (session('role') !== 'teacher') return redirect()->route('auth.login');
        return view('teacher.dashboard');
    })->name('teacher.dashboard');
});

Route::prefix('student')->group(function () {
    Route::get('/dashboard', function () {
        if (session('role') !== 'student') return redirect()->route('auth.login');
        return view('student.dashboard');
    })->name('student.dashboard');
});

Route::prefix('parent')->group(function () {
    Route::get('/dashboard', function () {
        if (session('role') !== 'parent') return redirect()->route('auth.login');
        return view('parent.dashboard');
    })->name('parent.dashboard');
});


// =====================
// Default Redirect
// =====================
Route::get('/', fn() => redirect()->route('auth.login'));

?>
