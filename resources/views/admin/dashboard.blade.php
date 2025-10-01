<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - RM Jewelry</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-500">

    <div class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">Admin Dashboard</h1>

        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit"
                class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                Logout
            </button>
        </form>
    </div>

    <main class="p-6 max-w-7xl mx-auto">

        <!-- User Statistics -->
        <div class="mb-6">
            @livewire('admin.user-stats')
        </div>

        <div class="border-b border-gray-300 mb-6"></div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Popular Category Card -->
            <div class="bg-yellow-50 rounded-xl shadow-lg p-6 border-l-8 border-yellow-400 hover:shadow-2xl hover:scale-105 transition transform duration-300">
                <h2 class="text-xl font-bold mb-2 text-gray-800">Popular Category</h2>
                <p class="text-gray-700 mb-4">Based on recent sales and user interest</p>
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('images/popular.png') }}" 
                        alt="Popular Category" 
                        class="w-32 h-32 rounded-full border-2 border-yellow-400 shadow-md object-cover">
                    <div>
                        <h3 class="text-2xl font-semibold text-yellow-600">Rings</h3>
                        <p class="text-gray-700 text-sm mt-1">Top-selling jewelry category</p>
                    </div>
                </div>
            </div>

            <!-- Admin Tips Card -->
            <div class="bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-xl shadow-lg p-6 hover:shadow-2xl transition duration-300">
                <h2 class="text-xl font-bold mb-2">Admin Tips</h2>
                <p class="text-sm text-indigo-100 mb-4">Small tips to manage store efficiently</p>
                <ul class="list-disc list-inside space-y-2 text-indigo-100">
                    <li>Update stock products regularly</li>
                    <li>View all user reviews</li>
                    <li>Highlight trending products on the homepage</li>
                </ul>
            </div>

        </div>
    </main>

    @livewireScripts
</body>
</html>
