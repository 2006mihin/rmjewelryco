<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6">Your Cart</h2>

    @if(session()->has('success'))
        <div class="bg-green-200 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif
    @if(session()->has('error'))
        <div class="bg-red-200 p-3 rounded mb-4">{{ session('error') }}</div>
    @endif

    @if($cart)
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
                @foreach($cart as $item)
                <tr>
                    <td class="p-2 flex items-center">
                        <img src="{{ asset($item['image']) }}" class="w-12 h-12 mr-2 object-contain">
                        {{ $item['name'] }}
                    </td>
                    <td class="p-2">Rs {{ number_format($item['price'], 2) }}</td>
                    <td class="p-2">
                        <input type="number" value="{{ $item['quantity'] }}" class="w-16 border rounded p-1"
                               wire:change="updateQuantity({{ $item['product_id'] }}, $event.target.value)">
                    </td>
                    <td class="p-2">Rs {{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                    <td class="p-2">
                        <button wire:click="removeItem({{ $item['product_id'] }})"
                                class="bg-red-500 text-white px-3 py-1 rounded">
                            Remove
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6 text-right">
            <h3 class="text-xl font-bold">Total: Rs {{ number_format($this->total, 2) }}</h3>
            <button wire:click="placeOrder" class="bg-green-600 text-white px-4 py-2 rounded mt-3">
                Place Order
            </button>
        </div>
    @else
        <p class="text-gray-500">Your cart is empty.</p>
    @endif
</div>
