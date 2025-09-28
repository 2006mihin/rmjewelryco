<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earrings</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

    {{-- Header --}}
    @include('layouts.header')

    {{-- Page Content --}}
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Earrings</h1>

        @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
            <div class="border p-4 rounded shadow hover:shadow-lg transition">
                <img src="{{ asset($product->image) }}" alt="{{ $product->product_name }}" class="w-full h-48 object-cover mb-2">
                <h2 class="font-semibold">{{ $product->product_name }}</h2>
                <p class="text-gray-600">Price: ${{ $product->price }}</p>
                <p class="text-gray-600">Stock: {{ $product->quantity }}</p>
            </div>
            @endforeach
        </div>
        @else
            <p>No products found.</p>
        @endif
    </div>

</body>
</html>
