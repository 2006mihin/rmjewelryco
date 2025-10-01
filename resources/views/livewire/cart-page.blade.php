<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6">Your Cart</h2>

    @if(session()->has('success'))
        <div class="bg-green-200 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    @if(session()->has('error'))
        <div class="bg-red-200 p-3 rounded mb-4">{{ session('error') }}</div>
    @endif

    @if($cart && count($cart) > 0)
        <table class="w-full border text-center">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2">Product</th>
                    <th class="p-2">Price</th>
                    <th class="p-2">Quantity</th>
                    <th class="p-2">Subtotal</th>
                    <th class="p-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $productId => $item)
                    <tr class="border-b">
                        
                        <td class="p-2 text-center">
                            <div class="flex flex-col items-center">
                                <img src="{{ asset($item['image']) }}" 
                                     alt="{{ $item['name'] }}"
                                     class="w-16 h-16 object-contain mb-2">
                                <span class="font-medium">{{ $item['name'] }}</span>
                            </div>
                        </td>

                        
                        <td class="p-2 align-middle">
                            Rs {{ number_format($item['price'], 2) }}
                        </td>

                        
                        <td class="p-2 align-middle">
                            <input type="number" min="1" value="{{ $item['quantity'] }}"
                                   class="w-16 border rounded p-1 text-center"
                                   wire:change="updateQuantity({{ $productId }}, $event.target.value)">
                        </td>

                       
                        <td class="p-2 align-middle">
                            Rs {{ number_format($item['price'] * $item['quantity'], 2) }}
                        </td>

                        
                        <td class="p-2 align-middle">
                            <button wire:click="removeItem({{ $productId }})"
                                    class="bg-red-500 text-white px-3 py-1 rounded">
                                Remove
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        
        <div class="mt-6 text-right">
            <h3 class="text-xl font-bold">Total: Rs {{ number_format($total, 2) }}</h3>
            <button wire:click="placeOrder"
                    class="bg-green-600 text-white px-4 py-2 rounded mt-3">
                Place Order
            </button>
        </div>
    @else
        <p class="text-gray-500">Your cart is empty.</p>
    @endif
</div>
