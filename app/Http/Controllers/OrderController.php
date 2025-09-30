<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderProduct;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $cart = Session::get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to place an order.');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        DB::beginTransaction();
        try {
            // create order
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_date' => Carbon::now()->toDateString(),
                'status' => 'pending',
                'total_price' => $total,
            ]);

            // attach products
            foreach ($cart as $item) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'custom_name' => $item['name'],
                    'quantity' => $item['quantity'],
                ]);
            }

            DB::commit();

            // clear cart
            Session::forget('cart');

            return redirect()->back()->with('success', 'Order placed successfully!');

        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Could not place order: '.$e->getMessage());
        }
    }
}
