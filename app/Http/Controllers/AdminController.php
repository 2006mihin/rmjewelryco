<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Admin;

class AdminController extends Controller
{
    // Admin Dashboard
    public function dashboard()
    {
        // Manual session check
        if (!Auth::guard('admin')->check()) {
            return redirect('/admin/login');
        }

        $totalOrders    = class_exists(Order::class) ? Order::count() : 0;
        $totalProducts  = class_exists(Product::class) ? Product::count() : 0;
        $userCount      = class_exists(User::class) ? User::count() : 0;
        $adminCount     = class_exists(Admin::class) ? Admin::count() : 0;

        $totalUsers     = $userCount + $adminCount;
        $totalCustomers = $userCount;
        $totalAdmins    = $adminCount;

        return view('admin.dashboard', compact(
            'totalOrders',
            'totalProducts',
            'totalUsers',
            'totalCustomers',
            'totalAdmins'
        ));
    }

    // View all users (Admins + Users)
    public function viewUsers()
    {
        if (!Auth::guard('admin')->check()) {
            return redirect('/admin/login');
        }

        $admins = Admin::all();
        $users  = User::all();

        return view('admin.users', compact('admins', 'users'));
    }
}
