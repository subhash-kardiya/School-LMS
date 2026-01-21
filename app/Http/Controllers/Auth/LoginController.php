<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();

        // dd([
        //     'admin_exists' => $admin ? true : false,
        //     'hash' => $admin ? $admin->password : null,
        //     'check' => $admin ? Hash::check($request->password, $admin->password) : null
        // ]);

        if (!$admin) {
            return back()->withErrors(['email' => 'Admin not found']);
        }

        if (!Hash::check($request->password, $admin->password)) {
            return back()->withErrors(['password' => 'Incorrect password']);
        }

        session([
            'auth_id' => $admin->id,
            'role' => 'admin'
        ]);

        return redirect('/admin/dashboard');

        // TEACHER
        $teacher = \App\Models\Teacher::where('email', $request->email)->first();
        if ($teacher && Hash::check($request->password, $teacher->password)) {
            session([
                'auth_id' => $teacher->id,
                'role' => 'teacher'
            ]);
            return redirect('/teacher/dashboard');
        }

        // STUDENT
        $student = \App\Models\Student::where('email', $request->email)->first();
        if ($student && Hash::check($request->password, $student->password)) {
            session([
                'auth_id' => $student->id,
                'role' => 'student'
            ]);
            return redirect('/student/dashboard');
        }

        // PARENT
        $parent = \App\Models\ParentModel::where('email', $request->email)->first();
        if ($parent && Hash::check($request->password, $parent->password)) {
            session([
                'auth_id' => $parent->id,
                'role' => 'parent'
            ]);
            return redirect('/parent/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid login details']);
    }

    public function logout()
    {
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login');
    }
}
