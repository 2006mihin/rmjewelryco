<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="w-full max-w-md bg-white p-6 rounded-2xl shadow-lg">
    <h1 class="text-2xl font-bold mb-6 text-center">Admin Login</h1>

    <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email" required class="w-full border px-2 py-1 rounded">
        </div>

        <div class="mb-4">
            <label>Password</label>
            <input type="password" name="password" required class="w-full border px-2 py-1 rounded">
        </div>

        @if($errors->any())
            <div class="text-red-500 mb-2">{{ $errors->first() }}</div>
        @endif

        <div class="flex justify-between items-center">
            <a href="{{ route('user.login') }}" class="text-sm text-gray-600 underline">User Login</a>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Login</button>
        </div>
    </form>
</div>

</body>
</html>
