<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('user.register.submit') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name"
                         class="block mt-1 w-full"
                         type="text"
                         name="name"
                         :value="old('name')"
                         required
                         autofocus
                         autocomplete="name" />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email"
                         class="block mt-1 w-full"
                         type="email"
                         name="email"
                         :value="old('email')"
                         required
                         autocomplete="username" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password"
                         class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required
                         autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation"
                         class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation"
                         required
                         autocomplete="new-password" />
            </div>

            <!-- Terms (Optional) -->
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <!-- Actions -->
            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                   href="{{ route('user.login') }}">
                    {{ __('Already registered? Login') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>

        <!-- Admin login shortcut -->
        <div class="mt-6 text-center">
            <a href="{{ route('admin.login') }}"
               class="underline text-sm text-blue-600 hover:text-blue-900">
                {{ __('Admin Login') }}
            </a>
        </div>
    </x-authentication-card>
</x-guest-layout>
