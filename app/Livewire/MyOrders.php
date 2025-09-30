<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class MyOrders extends Component
{
    public $orders = [];

    public function mount()
    {
        $this->orders = Order::where('user_id', Auth::id())
            ->with('products')
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.my-orders');
    }
}
