@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Profile</h1>

        @livewire('profile.update-profile-information-form')
        <div class="mt-8">
            @livewire('profile.update-password-form')
        </div>
        <div class="mt-8">
            @livewire('profile.two-factor-authentication-form')
        </div>
        <div class="mt-8">
            @livewire('profile.logout-other-browser-sessions-form')
        </div>
        <div class="mt-8">
            @livewire('profile.delete-user-form')
        </div>
    </div>
@endsection
