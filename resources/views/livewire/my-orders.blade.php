
    <div class="bg-white shadow rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-4 text-gray-900">My Orders</h2>

    @if(empty($orders) || $orders->isEmpty())
        <p class="text-gray-500 text-sm">You haven’t placed any orders yet.</p>
    @else
    <div wire:poll.2s>
        <table class="w-full border text-center text-gray-700 text-sm">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 font-medium text-gray-900">Order ID</th>
                    <th class="p-2 font-medium text-gray-900">Date</th>
                    <th class="p-2 font-medium text-gray-900">Status</th>
                    <th class="p-2 font-medium text-gray-900">Total</th>
                    <th class="p-2 font-medium text-gray-900">Products</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr class="border-t">
                        <td class="p-2">{{ $order->id }}</td>
                        <td class="p-2">{{ $order->order_date }}</td>
                        <td class="p-2 capitalize">
                            <span class="@if($order->status == 'pending') text-yellow-600 @elseif($order->status == 'completed') text-green-600 @else text-gray-600 @endif font-medium">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td class="p-2 font-medium">Rs {{ number_format($order->total_price, 2) }}</td>
                        <td class="p-2 text-center align-middle">
                            <ul class="list-disc list-inside inline-block text-left">
                                @foreach($order->products as $product)
                                    <li>{{ $product->product_name }} (x{{ $product->pivot->quantity }})</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
