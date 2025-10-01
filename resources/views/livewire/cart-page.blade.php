<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6 text-center sm:text-left">Your Cart</h2>

    @if(session()->has('success'))
        <div class="bg-green-200 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    @if(session()->has('error'))
        <div class="bg-red-200 p-3 rounded mb-4">{{ session('error') }}</div>
    @endif

    @if($cart && count($cart) > 0)
        <!-- Desktop Table -->
        <div class="hidden sm:block overflow-x-auto">
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
                            <td class="p-2">Rs {{ number_format($item['price'], 2) }}</td>
                            <td class="p-2">
                                <input type="number" min="1" value="{{ $item['quantity'] }}"
                                       class="w-16 border rounded p-1 text-center"
                                       wire:change="updateQuantity({{ $productId }}, $event.target.value)">
                            </td>
                            <td class="p-2">Rs {{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                            <td class="p-2">
                                <button wire:click="removeItem({{ $productId }})"
                                        class="bg-red-500 text-white px-3 py-1 rounded">
                                    Remove
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Mobile Cards -->
        <div class="sm:hidden flex flex-col space-y-4">
            @foreach($cart as $productId => $item)
                <div class="border rounded-lg p-4 shadow flex flex-col sm:flex-row sm:items-center">
                    <div class="flex-shrink-0 mb-4 sm:mb-0 sm:mr-4 flex justify-center">
                        <img src="{{ asset($item['image']) }}" 
                             alt="{{ $item['name'] }}" 
                             class="w-20 h-20 object-contain rounded">
                    </div>
                    <div class="flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="font-semibold text-lg">{{ $item['name'] }}</h3>
                            <p class="text-gray-600 text-sm mt-1">Price: Rs {{ number_format($item['price'], 2) }}</p>
                            <div class="flex items-center space-x-2 mt-2">
                                <label class="text-gray-700 text-sm">Qty:</label>
                                <input type="number" min="1" value="{{ $item['quantity'] }}"
                                       class="w-16 border rounded p-1 text-center text-sm"
                                       wire:change="updateQuantity({{ $productId }}, $event.target.value)">
                            </div>
                            <p class="mt-2 font-semibold text-sm">Subtotal: Rs {{ number_format($item['price'] * $item['quantity'], 2) }}</p>
                        </div>
                        <div class="mt-2 sm:mt-0 sm:self-end">
                            <button wire:click="removeItem({{ $productId }})"
                                    class="bg-red-500 text-white px-3 py-1 rounded text-sm w-full sm:w-auto">
                                Remove
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Total & Place Order -->
        <div class="mt-6 text-right sm:text-right">
            <h3 class="text-xl font-bold mb-2">Total: Rs {{ number_format($total, 2) }}</h3>
            <button wire:click="placeOrder"
                    class="bg-green-600 text-white px-4 py-2 rounded mt-3 w-full sm:w-auto">
                Place Order
            </button>
        </div>

    @else
        <p class="text-gray-500 text-center sm:text-left">Your cart is empty.</p>
    @endif
</div>
