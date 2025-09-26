<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Admin;

class AdminController extends Controller
{
    public function dashboard()
{
    if (!Auth::guard('admin')->check()) {
        abort(403, 'Unauthorized access');
    }

    $totalOrders    = class_exists(Order::class) ? Order::count() : 0;
    $totalProducts  = class_exists(Product::class) ? Product::count() : 0;

    $userCount = class_exists(User::class) ? User::count() : 0;
    $adminCount = class_exists(Admin::class) ? Admin::count() : 0;

    $totalUsers = $userCount + $adminCount;   // 👈 Total users = users + admins
    $totalCustomers = $userCount;             // only regular users
    $totalAdmins = $adminCount;

    return view('admin.dashboard', compact(
        'totalOrders',
        'totalProducts',
        'totalUsers',
        'totalCustomers',
        'totalAdmins'
    ));
}

}
