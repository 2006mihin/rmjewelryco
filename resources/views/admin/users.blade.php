<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users - Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="p-6 bg-gray-400">

    <div class="container mx-auto px-4 py-8">


        <div class="mb-6">
            <a href="{{ route('admin.dashboard') }}" 
               class="inline-block bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
                &larr; Back to Dashboard
            </a>
        </div>

        <h1 class="text-3xl font-bold mb-6 text-center text-gray-1000">All Users</h1>

        <!-- Admins Table -->
        <div class="mb-10">
            <h2 class="text-2xl font-semibold mb-4 text-gray-900">Admins</h2>
            @if($admins->count() > 0)
                <div class="overflow-x-auto rounded-lg shadow-md">
                    <table class="min-w-full bg-white divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">ID</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Name</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Email</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($admins as $admin)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-3 text-sm text-gray-700">{{ $admin->id }}</td>
                                <td class="px-6 py-3 text-sm text-gray-700">{{ $admin->name }}</td>
                                <td class="px-6 py-3 text-sm text-gray-700">{{ $admin->email }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-500 italic">No admins found.</p>
            @endif
        </div>

        <!-- Users Table -->
        <div>
            <h2 class="text-2xl font-semibold mb-4 text-gray-900">Users</h2>
            @if($users->count() > 0)
                <div class="overflow-x-auto rounded-lg shadow-md">
                    <table class="min-w-full bg-white divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">ID</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Name</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Email</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($users as $user)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-3 text-sm text-gray-700">{{ $user->id }}</td>
                                <td class="px-6 py-3 text-sm text-gray-700">{{ $user->name }}</td>
                                <td class="px-6 py-3 text-sm text-gray-700">{{ $user->email }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-500 italic">No users found.</p>
            @endif
        </div>

    </div>

</body>
</html>