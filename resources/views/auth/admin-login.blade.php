<x-guest-layout>
    <div class="relative min-h-screen flex">

    
        <div class="absolute inset-0"
             style="background: url('{{ asset('images/loginbg.jpg') }}') no-repeat center center; background-size: cover;">
        </div>
        <div class="absolute inset-0 bg-black bg-opacity-70"></div>

       
        <div class="relative flex-1 flex items-center justify-end">
            <div class="bg-white bg-opacity-80 shadow-2xl rounded-3xl p-10 max-w-md w-full mr-16">
                
               
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="h-20 w-auto" />
                </div>

                <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Admin Login</h1>

                <form action="{{ route('admin.login.submit') }}" method="POST" class="w-full">
                    @csrf

                   
                    <div class="mb-5">
                        <x-label for="email" value="Email" class="text-gray-700 font-semibold mb-1" />
                        <x-input id="email" type="email" name="email" required autofocus
                                 class="w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 rounded-lg" />
                    </div>

                  
                    <div class="mb-5">
                        <x-label for="password" value="Password" class="text-gray-700 font-semibold mb-1" />
                        <x-input id="password" type="password" name="password" required
                                 class="w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 rounded-lg" />
                    </div>

                 
                    @if($errors->any())
                        <div class="text-red-500 text-sm mb-3">{{ $errors->first() }}</div>
                    @endif

                    <div class="flex justify-between items-center mt-6">
                        <a href="{{ route('user.login') }}" class="text-sm text-blue-600 hover:text-blue-800 underline">
                            User Login
                        </a>
                        <x-button class="ml-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-lg shadow">
                            Login
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
