<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartPage extends Component
{
    public $cart = [];

    public function mount()
    {
        // Load existing cart from session
        $this->cart = Session::get('cart', []);

        // Check if user clicked Add to Cart via query param
        $productId = request()->query('add');
        if ($productId) {
            $this->addToCart($productId);
            // Remove query param so it doesn’t repeat
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
        if(isset($cart[$productId])) {
            $cart[$productId]['quantity'] = max(1, (int)$quantity);
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
        if(empty($this->cart)) {
            session()->flash('error', 'Your cart is empty!');
            return;
        }

        // TODO: save order in database if needed

        Session::forget('cart');
        $this->cart = [];
        session()->flash('success', 'Order placed successfully!');
    }

    public function render()
    {
        return view('livewire.cart-page');
    }
}
