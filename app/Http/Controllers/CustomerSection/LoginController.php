<?php

namespace App\Http\Controllers\CustomerSection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
     public function index()
    {
        if (Auth::guard('pemohon')->check()) {
            return redirect()->intended('pemohon');
        }

        return view('pemohon.login')->with([
            'title' => 'Login Pemohon'
        ]);
    }
    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to log the user in
        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route('customer.dashboard')->with('success', 'Login successful!');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('customer.login')->with('success', 'Logged out successfully!');
    }
    public function showForgotPasswordForm()
    {
        return view('customer.forgot-password');
    }
}
