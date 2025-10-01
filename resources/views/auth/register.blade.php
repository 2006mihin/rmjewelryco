<x-guest-layout>
    <div class="relative min-h-screen flex items-center justify-center">

        <div class="absolute inset-0"
             style="background: url('{{ asset('images/reg.webp') }}') no-repeat center center; background-size: cover;">
        </div>

        <div class="absolute inset-0 bg-black bg-opacity-70"></div>
    
        <div class="relative bg-white bg-opacity-60 shadow-2xl rounded-2xl p-8 max-w-sm w-full flex flex-col items-center">


            
            <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="h-20 w-auto mb-5" />

          
            <x-validation-errors class="mb-4 text-red-600" />

            <form method="POST" action="{{ route('user.register.submit') }}" class="w-full">
                @csrf

                <div>
                    <x-label for="name" value="{{ __('Name') }}" class="text-gray-700 font-semibold" />
                    <x-input id="name"
                             class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-lg"
                             type="text"
                             name="name"
                             :value="old('name')"
                             required
                             autofocus
                             autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" class="text-gray-700 font-semibold" />
                    <x-input id="email"
                             class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-lg"
                             type="email"
                             name="email"
                             :value="old('email')"
                             required
                             autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" class="text-gray-700 font-semibold" />
                    <x-input id="password"
                             class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-lg"
                             type="password"
                             name="password"
                             required
                             autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-gray-700 font-semibold" />
                    <x-input id="password_confirmation"
                             class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-lg"
                             type="password"
                             name="password_confirmation"
                             required
                             autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />
                                <div class="ms-2 text-sm text-gray-600">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-blue-600 hover:text-blue-800">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-blue-600 hover:text-blue-800">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="flex items-center justify-between mt-6">
                    <a class="text-sm text-blue-600 hover:text-blue-800 underline"
                       href="{{ route('user.login') }}">
                        {{ __('Already registered? Login') }}
                    </a>

                    <x-button class="ml-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('admin.login') }}"
                   class="text-sm text-gray-700 hover:text-red-500 underline">
                    {{ __('Admin Login') }}
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
