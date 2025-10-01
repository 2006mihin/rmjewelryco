<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Ensure admin is logged in.
     */
    private function requireAdmin()
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->send();
        }
    }

    /**
     * Show Admin Dashboard
     */
    public function dashboardView()
    {
        $this->requireAdmin();

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

    /**
     * Show Users (Web)
     */
    public function viewUsersWeb()
    {
        $this->requireAdmin();

        $admins = Admin::all();
        $users  = User::all();

        return view('admin.users', compact('admins', 'users'));
    }

    /**
     * Show Products Manage Page
     */
    public function manageProducts()
    {
        $this->requireAdmin();

        return view('admin.productmanage');
    }

    /**
     * Show Users (API)
     */
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
