<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Jewelry</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
          integrity="sha512-pap9c3n6EhxyU3fB/..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-white text-gray-800">

    {{-- Include your normal site header --}}
    @include('layouts.header')

    <main class="container mx-auto mt-6">
        <h1 class="text-2xl font-bold mb-4 text-gray-900">Profile</h1>

        {{-- Update Profile Info --}}
        @livewire('profile.update-profile-information-form')

        {{-- Update Password --}}
        <div class="mt-8">
            @livewire('profile.update-password-form')
        </div>

        {{-- Delete Account --}}
        <div class="mt-8">
            @livewire('profile.delete-user-form')
        </div>
        
        {{-- My Orders --}}
        <div class="mt-8">
             @livewire('my-orders')
        </div>
    </main>
    @include('layouts.footer')
    @livewireScripts
</body>
</html>
