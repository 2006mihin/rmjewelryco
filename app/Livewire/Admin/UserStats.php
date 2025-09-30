<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review; // ✅ import Review model

class UserStats extends Component
{
    public $totalOrders;
    public $totalProducts;
    public $totalUsers;
    public $totalAdmins;
    public $totalCustomers;
    public $totalReviews; // ✅ new property

    protected $listeners = ['refreshUserStats' => '$refresh'];

    public function loadCounts()
    {
        $this->totalOrders    = Order::count();
        $this->totalProducts  = Product::count();
        $this->totalUsers     = User::count();
        $this->totalAdmins    = Admin::count();
        $this->totalCustomers = User::count(); // (customers same as users here)
        $this->totalReviews   = Review::count(); // ✅ count reviews
    }

    public function render()
    {
        $this->loadCounts();
        return view('livewire.admin.user-stats');
    }
}
