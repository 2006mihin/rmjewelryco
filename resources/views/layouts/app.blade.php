<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'RM Jewelry') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex flex-col">

        <!-- Header -->
        <header class="bg-white shadow sticky top-0 z-50">
            <div class="container mx-auto flex justify-between items-center px-4 py-4">
                <a href="{{ url('/') }}" class="text-lg font-bold">RM Jewelry</a>

                <div class="flex items-center space-x-4">
                    @auth
                        <!-- Logged in user -->
                        <a href="{{ route('home') }}" class="hover:text-blue-600">Home</a>
                        <a href="{{ route('profile.show') }}" class="hover:text-blue-600">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="hover:text-red-600">Logout</button>
                        </form>
                    @else
                        <!-- Guest -->
                        <a href="{{ route('login') }}" class="hover:text-blue-600">Login</a>
                        <a href="{{ route('register') }}" class="hover:text-blue-600">Sign Up</a>
                    @endauth
                </div>
            </div>
        </header>

        <!-- Page content -->
        <main class="flex-grow p-6">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gray-200 shadow p-4 text-center">
            &copy; {{ date('Y') }} RM Jewelry. All rights reserved.
        </footer>
    </div>
</body>
</html>
