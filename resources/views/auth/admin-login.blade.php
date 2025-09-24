<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <a href="{{ url('/') }}">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <div>
                <x-label for="email" value="Email" />
                <x-input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="password" value="Password" />
                <x-input id="password" type="password" name="password" required />
            </div>

            <div class="block mt-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm">
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                <a href="{{ route('user.login') }}" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Back to User Login
                </a>
                <x-button class="ml-3">Login as Admin</x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
