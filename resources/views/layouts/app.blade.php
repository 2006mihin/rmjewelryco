<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <nav class="bg-white shadow p-4">
            <div class="container mx-auto flex justify-between">
                <a href="{{ url('/') }}" class="text-lg font-bold">RM Jewelry</a>
                <div>
                    @auth('admin')
                        <a href="{{ route('admin.dashboard') }}" class="mr-4">Admin Dashboard</a>
                        <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-red-600">Logout</button>
                        </form>
                    @elseif(auth()->check())
                        <a href="{{ route('user.dashboard') }}" class="mr-4">Dashboard</a>
                        <form method="POST" action="{{ route('user.logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-red-600">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('user.login') }}" class="mr-4">Login</a>
                        <a href="{{ route('user.register') }}">Register</a>
                    @endauth
                </div>
            </div>
        </nav>

        <main class="flex-grow p-6">
            @yield('content')
        </main>

        <footer class="bg-gray-200 shadow p-4 text-center">
            &copy; {{ date('Y') }} RM Jewelry. All rights reserved.
        </footer>
    </div>
</body>
</html>
