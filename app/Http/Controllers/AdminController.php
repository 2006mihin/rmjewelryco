<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.dashboard');
        }

        abort(403, 'Unauthorized access');
    }
}
