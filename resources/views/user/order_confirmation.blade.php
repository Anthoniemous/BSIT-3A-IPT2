<!-- filepath: c:\Users\archi\OneDrive\Desktop\Boiser-A\Boiser-Laravel\resources\views\user\order_confirmation.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - Archiora Pets</title>
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-[Poppins] text-gray-800">
    <div class="max-w-4xl mx-auto p-8">
        <h1 class="text-4xl font-extrabold text-orange-800 mb-8">Order Confirmation</h1>
        <p class="text-lg mb-6">Thank you for your order! Your order has been placed successfully.</p>

        <div class="bg-white p-6 rounded-lg shadow mb-6">
            <h2 class="text-2xl font-bold text-orange-800 mb-4">Order Details</h2>
            <p><strong>Order ID:</strong> {{ $order->id }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Total:</strong> ₱{{ number_format($order->total, 2) }}</p>
            <p><strong>Billing Info:</strong> {{ $order->billing['fullName'] }} - {{ $order->billing['email'] }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-bold text-orange-800 mb-4">Items Ordered</h3>
            @if($order->items && $order->items->count() > 0)  <!-- Added null/empty check -->
                <ul class="space-y-2">
                    @foreach($order->items as $item)  <!-- Changed 'orderItems' to 'items' -->
                        <li>{{ $item->product_name }} (x{{ $item->quantity }}) - ₱{{ number_format($item->subtotal, 2) }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-600">No items found for this order. If this is unexpected, please contact support.</p>
            @endif
        </div>

        <a href="{{ route('dashboard') }}" class="inline-block mt-6 px-6 py-3 bg-orange-600 text-white font-semibold rounded-full hover:bg-orange-700">Continue Shopping</a>
    </div>
</body>
</html>