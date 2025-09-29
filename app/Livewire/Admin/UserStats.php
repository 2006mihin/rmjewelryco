<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;

class UserStats extends Component
{
    public $totalOrders;
    public $totalProducts;
    public $totalUsers;
    public $totalAdmins;
    public $totalCustomers;

    protected $listeners = ['refreshUserStats' => '$refresh'];

    public function loadCounts()
    {
        $this->totalOrders    = Order::count();
        $this->totalProducts  = Product::count();
        $this->totalUsers     = User::count();     // all users
        $this->totalAdmins    = Admin::count();    // all admins
        $this->totalCustomers = User::count();     // customers == users
    }

    public function render()
    {
        $this->loadCounts();
        return view('livewire.admin.user-stats');
    }
}
