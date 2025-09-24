<x-guest-layout>
    <div class="flex flex-col justify-center items-center h-screen">
        <h1 class="text-4xl font-bold mb-6">Welcome to RM Jewelry</h1>
        <p class="text-lg text-gray-600 mb-6">Discover our finest collection of jewelry.</p>
        <div class="flex space-x-4">
            <a href="{{ route('user.login') }}" 
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Login
            </a>
            <a href="{{ route('user.register') }}" 
               class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                Register
            </a>
        </div>
    </div>
</x-guest-layout>
