<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - RM Jewelry</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
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

        <!-- Stats Grid (Livewire Component) -->
        @livewire('admin.user-stats')


        <!-- Recent Activity -->
        <div class="mt-10 bg-white rounded-xl shadow p-6">
            <h2 class="text-lg font-semibold mb-4">Recent Activity</h2>
            <div class="text-gray-500 italic">
                Recent user registrations, orders, or other activities will appear here.
            </div>
        </div>
    </main>

    @livewireScripts
</body>
</html>
