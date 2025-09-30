<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;

class AdminOrdersController extends Controller
{
    // Show all orders
    public function index()
    {
        $orders = Order::with('products')->orderBy('id', 'desc')->get();
        return view('admin.ordermanage', compact('orders'));
    }

    // Update order status
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $request->validate([
            'status' => 'required|string|in:pending,processing,completed,canceled'
        ]);

        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully!');
    }
}
