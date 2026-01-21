
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
})->name('login');


Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/admin/dashboard', function () {
    if (session('role') !== 'admin') {
        return redirect('/');
    }
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/teacher/dashboard', function () {
    if (session('role') !== 'teacher') {
        return redirect('/');
    }
    return view('teacher.dashboard');
})->name('teacher.dashboard');

Route::get('/student/dashboard', function () {
    if (session('role') !== 'student') {
        return redirect('/');
    }
    return view('student.dashboard');
})->name('student.dashboard');

Route::get('/parent/dashboard', function () {
    if (session('role') !== 'parent') {
        return redirect('/');
    }
    return view('parent.dashboard');
})->name('parent.dashboard');
