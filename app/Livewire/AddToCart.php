<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class AddToCart extends Component
{
    public $productId;

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function addToCart()
    {
        $product = Product::find($this->productId);
        if (!$product) return;

        $cart = Session::get('cart', []);
        if (isset($cart[$this->productId])) {
            $cart[$this->productId]['quantity'] += 1;
        } else {
            $cart[$this->productId] = [
                'product_id' => $product->id,
                'name' => $product->product_name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
            ];
        }

        Session::put('cart', $cart);

       
        $this->dispatch('cartUpdated'); 
        session()->flash('success', "{$product->product_name} added to cart!");
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
