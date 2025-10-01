<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earrings</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-800">

    @include('layouts.header')

    <section class="container mx-auto px-4 sm:px-6 py-8">
            <div class="w-full bg-gray-300 rounded-full shadow-md flex items-center justify-center relative px-6 py-3 mb-6">
   
            <h2 class="text-xl font-bold text-gray-800">
                EARRINGS COLLECTION
            </h2>
            
            <a href="{{ route('cart') }}" 
               class="absolute right-6 flex items-center text-gray-700 hover:text-gray-900 transition">
                <livewire:cart-counter />
            </a>
        </div>

        @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($products as $product)
                <div class="bg-white shadow-md p-4 rounded text-center transition transform hover:scale-105 hover:shadow-xl">
                    <img src="{{ asset($product->image) }}" 
                         alt="{{ $product->product_name }}" 
                         class="h-52 w-full object-contain mb-3" />

                    <p class="text-gray-600 text-sm mb-1">{{ $product->description }}</p>
                    <h3 class="text-lg font-semibold mb-1">{{ $product->product_name }}</h3>
                    <p class="text-gray-800 mb-1">Rs {{ number_format($product->price, 2) }}</p>
                    <p class="text-gray-600 text-sm mb-3">Stock: {{ $product->quantity }}</p>

                    @livewire('add-to-cart', ['productId' => $product->id], key($product->id))
                </div>
            @endforeach
        </div>
        @else
            <p class="text-center text-gray-500">No products found.</p>
        @endif
    </section>
    @include('layouts.footer')
</body>
</html>
