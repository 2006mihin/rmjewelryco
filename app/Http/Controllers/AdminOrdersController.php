<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class AdminOrdersController extends Controller
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
     * List all orders
     */
    public function index()
    {
        $this->requireAdmin();
    
        $orders = \App\Models\Order::latest()->get();
    
        return view('admin.ordermanage', compact('orders'));
    }
    

    /**
     * Update order status
     */
    public function updateStatus($id, Request $request)
    {
        $this->requireAdmin();

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated!');
    }
}
