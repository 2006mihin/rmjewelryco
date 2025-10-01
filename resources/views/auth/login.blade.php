<x-guest-layout>
    <div class="relative min-h-screen flex items-center justify-center">

        <div class="absolute inset-0"
             style="background: url('{{asset('images/reg.webp') }}') no-repeat center center; background-size: cover;">
        </div>

        <div class="absolute inset-0 bg-black bg-opacity-70"></div>
      
        <div class="relative bg-white bg-opacity-70 shadow-2xl rounded-2xl p-8 max-w-sm w-full flex flex-col items-center">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="h-20 w-auto mb-5" />

            
            <x-validation-errors class="mb-4 text-red-600" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('user.login.submit') }}" class="w-full">
                @csrf

             
                <div class="mb-3">
                    <x-label for="email" value="{{ __('Email') }}" class="text-gray-700 font-semibold" />
                    <x-input id="email"
                             class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-lg"
                             type="email"
                             name="email"
                             :value="old('email')"
                             required
                             autofocus
                             autocomplete="username" />
                </div>

         
                <div class="mb-3">
                    <x-label for="password" value="{{ __('Password') }}" class="text-gray-700 font-semibold" />
                    <x-input id="password"
                             class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-lg"
                             type="password"
                             name="password"
                             required
                             autocomplete="current-password" />
                </div>

               

             
                <div class="flex items-center justify-between mb-3">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:text-blue-800 underline"
                           href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-button class="ml-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg">
                        {{ __('Login') }}
                    </x-button>
                </div>
            </form>

     
            <div class="mt-4 text-center w-full">
                <a href="{{ route('user.register') }}"
                   class="text-sm text-blue-600 hover:text-blue-800 underline">
                    {{ __("Don't have an account? Register") }}
                </a>
            </div>

            <div class="mt-2 text-center w-full">
                <a href="{{ route('admin.login') }}"
                   class="text-sm text-gray-700 hover:text-red-500 underline">
                    {{ __('Admin Login') }}
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
