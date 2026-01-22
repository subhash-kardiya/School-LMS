<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;

class LoginController extends Controller
{
    public function showLogin()
    {
        return redirect()->route('admin.dashboard'); // example
    }
    // public function forgotPassword()
    // {
    //     return redirect()->route('auth.forgot.password'); // example
    // }


    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        // Generate 6-digit OTP
        $otp = rand(100000, 999999);

        // Store OTP + email in session
        session([
            'reset_email' => $request->email,
            'reset_otp' => $otp,
            'otp_time' => now()
        ]);

        // Send OTP Email
        Mail::to($request->email)->send(new OtpMail($otp));

        // Redirect to OTP page
        return redirect()->route('otp.page')
            ->with('success', 'OTP has been sent to your email!');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $storedOtp = session('reset_otp'); // fix here (match your forgotPassword session key)

        if ($request->otp == $storedOtp) {
            // OTP verified → allow password change
            session(['otp_verified' => true]);
            return redirect()->route('change.password')->with('success', 'OTP Verified! Now set new password.');
        } else {
            return back()->with('error', 'Invalid OTP ❌');
        }
    }
    public function showChangePasswordForm()
    {
        if (!session('otp_verified')) {
            return redirect()->route('otp.page')->with('error', 'You must verify OTP first!');
        }
        return view('auth.change-password');
    }
    public function changePassword(Request $request)
    {
        if (!session('otp_verified')) {
            return redirect()->route('otp.page')->with('error', 'You must verify OTP first!');
        }

        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $email = session('reset_email');
        $admin = Admin::where('email', $email)->first();

        if ($admin) {
            $admin->password = Hash::make($request->password);
            $admin->save();

            // Clear session keys
            session()->forget(['reset_email', 'reset_otp', 'otp_verified']);

            return redirect()->route('login')->with('success', 'Password changed successfully ✅');
        }

        return back()->with('error', 'User not found!');
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
