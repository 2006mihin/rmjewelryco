<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" wire:poll.5s>
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-gray-500 text-sm uppercase">Total Orders</h3>
        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalOrders }}</p>
    </div>

    <div class="bg-white rounded-xl shadow p-6 cursor-pointer"
         onclick="window.location.href='{{ route('admin.products.manage') }}'">
        <h3 class="text-gray-500 text-sm uppercase">Total Products</h3>
        <p class="text-3xl font-bold text-green-600 mt-2">{{ $totalProducts }}</p>
    </div>

    <div class="bg-white rounded-xl shadow p-6 cursor-pointer"
         onclick="window.location.href='{{ route('admin.users') }}'">
        <h3 class="text-gray-500 text-sm uppercase">All Users</h3>
        <p class="text-3xl font-bold text-purple-600 mt-2">{{ $totalUsers }}</p>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-gray-500 text-sm uppercase">Customers</h3>
        <p class="text-3xl font-bold text-yellow-600 mt-2">{{ $totalCustomers }}</p>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-gray-500 text-sm uppercase">Admins</h3>
        <p class="text-3xl font-bold text-red-600 mt-2">{{ $totalAdmins }}</p>
    </div>
</div>
