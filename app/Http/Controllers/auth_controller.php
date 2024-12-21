<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class auth_controller extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function login_post(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        if (Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Invalid password');
        }

        return redirect()->back()->with('success', 'Login successful');
    }

    public function register()
    {
        return view('register');
    }

    public function register_post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]); 

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Registration successful');
    }

    public function verify_email()
    {
        return view('verify-email');
    }

    public function verify_email_post(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        return redirect()->back()->with('success', 'Email verified');
    }

    public function forgotPassword()
    {
        return view('forgot-password');
    }
}

