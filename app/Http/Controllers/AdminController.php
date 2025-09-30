<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;

class AdminController extends Controller
{
    // ----------------- WEB Dashboard -----------------
    public function dashboardView()
    {
        $totalOrders    = \App\Models\Order::count();
        $totalProducts  = \App\Models\Product::count();
        $userCount      = User::count();
        $adminCount     = Admin::count();

        return view('admin.dashboard', compact(
            'totalOrders',
            'totalProducts',
            'userCount',
            'adminCount'
        ));
    }

    // ----------------- WEB Users Page -----------------
    public function viewUsersWeb()
    {
        $admins = Admin::all();
        $users  = User::all();

        // Pass data to Blade view
        return view('admin.users', compact('admins', 'users'));
    }

    // ----------------- API Users (JSON) -----------------
    public function viewUsersApi()
    {
        $admins = Admin::all(['id','name','email']);
        $users  = User::all(['id','name','email','user_type','profile_photo_url']);

        return response()->json([
            'status' => 'success',
            'admins' => $admins,
            'users'  => $users,
        ]);
    }
}
