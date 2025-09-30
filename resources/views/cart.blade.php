<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased bg-white text-gray-800">

@include('layouts.header')

<section class="container mx-auto px-4 py-8">
   

    @livewire('cart-page')
</section>

@livewireScripts
</body>
</html>
