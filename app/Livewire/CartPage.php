<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CartPage extends Component
{
    public $cart = [];

    public function mount()
    {
        // Load existing cart from session
        $this->cart = Session::get('cart', []);

        // Optional: handle ?add= query param
        $productId = request()->query('add');
        if ($productId) {
            $this->addToCart($productId);
            request()->session()->flash('success', 'Product added to cart!');
        }
    }

    public function addToCart($productId)
    {
        $product = Product::find($productId);
        if (!$product) return;

        $cart = Session::get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += 1;
        } else {
            $cart[$productId] = [
                'product_id' => $product->id,
                'name'       => $product->product_name,
                'price'      => $product->price,
                'quantity'   => 1,
                'image'      => $product->image,
            ];
        }

        Session::put('cart', $cart);
        $this->cart = $cart;
    }

    public function removeItem($productId)
    {
        $cart = Session::get('cart', []);
        unset($cart[$productId]);
        Session::put('cart', $cart);
        $this->cart = $cart;
    }

    public function updateQuantity($productId, $quantity)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = max(1, (int) $quantity);
            Session::put('cart', $cart);
            $this->cart = $cart;
        }
    }

    public function getTotalProperty()
    {
        $total = 0;
        foreach ($this->cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    public function placeOrder()
    {
        if (empty($this->cart)) {
            session()->flash('error', 'Your cart is empty!');
            return;
        }

        if (!Auth::check()) {
            session()->flash('error', 'You must be logged in to place an order!');
            return;
        }

        // Save order
        $order = Order::create([
            'user_id'    => Auth::id(),
            'order_date' => now(),
            'status'     => 'pending',
            'total_price' => $this->total, 
            // add total column in migration
        ]);

        // Attach products to order_product table
        foreach ($this->cart as $item) {
            $order->products()->attach($item['product_id'], [
                'custom_name' => $item['name'],
                'quantity'    => $item['quantity'],
            ]);
        }

        // Clear cart
        Session::forget('cart');
        $this->cart = [];

        session()->flash('success', 'Order placed successfully!');
    }

    public function render()
    {
        return view('livewire.cart-page', [
            'total' => $this->total,
        ]);
    }
}
