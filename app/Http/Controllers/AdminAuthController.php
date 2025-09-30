<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    // ----------------- WEB LOGIN -----------------
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/admin/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }

    // ----------------- API LOGIN -----------------
    public function apiLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials.'
            ], 401);
        }

        $token = $admin->createToken('admin-api-token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'token' => $token,
            'admin' => $admin->only(['id','name','email'])
        ]);
    }

    public function apiLogout(Request $request)
    {
        if ($request->user()) {
            $request->user()->currentAccessToken()->delete();
        }

        return response()->json(['message' => 'Logged out successfully']);
    }
}
