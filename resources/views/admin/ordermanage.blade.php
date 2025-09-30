<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Orders</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="p-6 bg-gray-50">

<div class="mb-6">
    <a href="{{ route('admin.dashboard') }}" 
       class="inline-block bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
        &larr; Back to Dashboard
    </a>
</div>

<h1 class="text-3xl font-bold mb-6 text-center text-gray-900">Order Management</h1>

@if(session()->has('success'))
    <div class="bg-green-200 p-3 rounded mb-4">{{ session('success') }}</div>
@endif

<div class="bg-white p-6 rounded shadow">
    <table class="w-full border text-center">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2">Order ID</th>
                <th class="p-2">User</th>
                <th class="p-2">Date</th>
                <th class="p-2">Status</th>
                <th class="p-2">Total</th>
                <th class="p-2">Products</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr class="border-b">
                    <td class="p-2">{{ $order->id }}</td>
                    <td class="p-2">{{ $order->user?->name ?? 'Unknown User' }}</td>
                    <td class="p-2">{{ $order->order_date }}</td>
                    <td class="p-2 capitalize">{{ $order->status }}</td>
                    <td class="p-2">Rs {{ number_format($order->total_price, 2) }}
                    <td class="p-2">
                            <ul class="list-none m-0 p-0 flex flex-col items-center">
                        @foreach($order->products as $product)
                        <li>{{ $product->product_name }} (x{{ $product->pivot->quantity }})</li>
                         @endforeach
    </ul>
</td>

                    <td class="p-2">
                        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="flex items-center justify-center space-x-2">
                            @csrf
                            @method('PUT')
                            
                            <select name="status" class="border rounded px-3 py-2 w-32 text-sm">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                            </select>

                            <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded">Update</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
