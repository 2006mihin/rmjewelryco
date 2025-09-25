<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login'); // login.blade.php
    }

    // Handle login
public function login(Request $request)
{
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::guard('web')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect('home'); // 👈 redirect to homepage
    }

    return back()->withErrors([
        'email' => 'Invalid email or password.'
    ])->onlyInput('email');
}

// Handle registration
public function register(Request $request)
{
    $request->validate([
        'name'                  => 'required|string|max:255',
        'email'                 => 'required|email|unique:users,email',
        'password'              => 'required|string|min:6|confirmed',
    ]);

    $user = User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
    ]);

    Auth::login($user);

    return redirect('home'); // 👈 redirect to homepage
}

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('user.login'); // redirect to login
    }
}
