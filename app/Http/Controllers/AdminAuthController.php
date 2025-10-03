<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    /**
     * Show admin login form
     */
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    /**
     * Handle admin login (Web)
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        //if email belongs to an admin
        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return back()->withErrors([
                'email' => 'Unauthorized access'
            ])->withInput();
        }

        // Attempt login using 'admin' guard
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate(); 
            return redirect('/admin/dashboard'); 
        }

     
        return back()->withErrors([
            'email' => 'Invalid credentials'
        ])->withInput();
    }

    /**
     * Handle admin logout (Web)
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();       
        $request->session()->invalidate();     
        $request->session()->regenerateToken(); 
        return redirect('/admin/login');        
    }

    /**
     * Handle admin login (API)
     */
    public function apiLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // if email belongs to an admin
        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized access.'
            ], 403);
        }

        if (!Hash::check($request->password, $admin->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials.'
            ], 401);
        }

        // Create API token using Sanctum
        $token = $admin->createToken('admin-api-token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'token' => $token,
            'admin' => $admin->only(['id','name','email'])
        ]);
    }

    /**
     * Handle admin logout (API)
     */
    public function apiLogout(Request $request)
    {
        if ($request->user()) {
            $request->user()->currentAccessToken()->delete(); 
        }

        return response()->json(['message' => 'Logged out successfully']);
    }
}
