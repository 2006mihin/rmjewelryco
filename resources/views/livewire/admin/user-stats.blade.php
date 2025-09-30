<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" wire:poll.5s>

    <!-- Total Orders (clickable) -->
    <div class="bg-white rounded-xl shadow p-6 transform transition duration-300 hover:scale-105 hover:shadow-lg cursor-pointer"
         onclick="window.location.href='{{ route('admin.orders.index') }}'">
        <h3 class="text-gray-500 text-sm uppercase">Total Orders</h3>
        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalOrders }}</p>
    </div>

    <!-- Total Products (clickable) -->
    <div class="bg-white rounded-xl shadow p-6 transform transition duration-300 hover:scale-105 hover:shadow-lg cursor-pointer"
         onclick="window.location.href='{{ route('admin.products.manage') }}'">
        <h3 class="text-gray-500 text-sm uppercase">Total Products</h3>
        <p class="text-3xl font-bold text-green-600 mt-2">{{ $totalProducts }}</p>
    </div>

    <!-- All Users (clickable) -->
    <div class="bg-white rounded-xl shadow p-6 transform transition duration-300 hover:scale-105 hover:shadow-lg cursor-pointer"
         onclick="window.location.href='{{ route('admin.users') }}'">
        <h3 class="text-gray-500 text-sm uppercase">All Users</h3>
        <p class="text-3xl font-bold text-purple-600 mt-2">{{ $totalUsers }}</p>
    </div>

    <!-- Customers (static) -->
    <div class="bg-gray-50 rounded-xl shadow p-6 border-b-4 border-black">
        <h3 class="text-gray-500 text-sm uppercase">Customers</h3>
        <p class="text-3xl font-bold text-yellow-600 mt-2">{{ $totalCustomers }}</p>
    </div>

    <!-- Admins (static) -->
    <div class="bg-gray-50 rounded-xl shadow p-6 border-b-4 border-black">
        <h3 class="text-gray-500 text-sm uppercase">Admins</h3>
        <p class="text-3xl font-bold text-red-600 mt-2">{{ $totalAdmins }}</p>
    </div>

    <!-- Total Reviews (static) -->
    <div class="bg-gray-50 rounded-xl shadow p-6 border-b-4 border-black">
        <h3 class="text-gray-500 text-sm uppercase">Total Reviews</h3>
        <p class="text-3xl font-bold text-indigo-600 mt-2">{{ $totalReviews }}</p>
    </div>
</div>
