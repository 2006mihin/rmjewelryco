<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - RM Jewelry</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">

    <!-- Header -->
    <div class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">Admin Dashboard</h1>

        <!-- Logout -->
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit"
                class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                Logout
            </button>
        </form>
    </div>

    <!-- Main Content -->
    <main class="p-6 max-w-7xl mx-auto">

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-gray-500 text-sm uppercase">Total Orders</h3>
                <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalOrders }}</p>
            </div>

            <div class="bg-white rounded-xl shadow p-6 cursor-pointer"
                 onclick="window.location.href='{{ route('admin.products.manage') }}'">
                <h3 class="text-gray-500 text-sm uppercase">Total Products</h3>
                <p class="text-3xl font-bold text-green-600 mt-2">{{ $totalProducts }}</p>
            </div>

            <!-- Make All Users card clickable - FIXED ROUTE NAME -->
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

        <!-- Recent Activity -->
        <div class="mt-10 bg-white rounded-xl shadow p-6">
            <h2 class="text-lg font-semibold mb-4">Recent Activity</h2>
            <div class="text-gray-500 italic">
                Recent user registrations, orders, or other activities will appear here.
            </div>
        </div>
    </main>

</body>
</html>