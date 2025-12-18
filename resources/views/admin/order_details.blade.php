<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Order Details</title>
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen flex font-[Poppins] text-gray-800">
    <!-- Sidebar -->
    <aside class="w-72 bg-amber-900 text-amber-50 flex flex-col justify-between shadow-2xl">
        <div>
            <div class="text-center py-8 border-b border-amber-800">
                <h1 class="text-3xl font-extrabold tracking-wide text-white">Admin Panel</h1>
                <p class="text-amber-300 text-sm mt-1">Welcome, Admin!</p>
            </div>
            <nav class="mt-8 space-y-2 px-6">
                <a href="/admin/dashboard" class="flex items-center gap-3 py-3 px-5 rounded-lg {{ request()->routeIs('dashboardadmin') ? 'bg-amber-800' : 'bg-amber-950/60' }} hover:bg-amber-800 transition duration-300 font-medium shadow-md">
                    <span class="text-lg">🏠</span> Dashboard
                </a>
                <a href="/admin/categories" class="flex items-center gap-3 py-3 px-5 rounded-lg {{ request()->routeIs('admin.categories.index') ? 'bg-amber-800' : 'bg-amber-950/60' }} hover:bg-amber-800 transition duration-300 font-medium shadow-md">
                    <span class="text-lg">🗂️</span> Manage Categories
                </a>
                <a href="/admin/products" class="flex items-center gap-3 py-3 px-5 rounded-lg {{ request()->routeIs('manageproducts') ? 'bg-amber-800' : 'bg-amber-950/60' }} hover:bg-amber-800 transition duration-300 font-medium shadow-md">
                    <span class="text-lg">📦</span> Manage Products
                </a>
                <a href="{{ route('admin.orders') }}" class="flex items-center gap-3 py-3 px-5 rounded-lg {{ request()->routeIs('admin.orders') ? 'bg-amber-800' : 'bg-amber-950/60' }} hover:bg-amber-800 transition duration-300 font-medium shadow-md">
                    <span class="text-lg">📋</span> Manage Orders
                </a>
            </nav>
        </div>
        <div class="px-6 mb-8">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2.5 rounded-lg transition font-semibold shadow-md hover:shadow-lg">🚪 Logout</button>
            </form>
        </div>
    </aside>
    <!-- Main Content -->
    <main class="flex-1 p-10 backdrop-blur-sm bg-amber-50/70 overflow-y-auto">
        <h1 class="text-4xl font-extrabold text-amber-900 mb-8">Order Details - ID: {{ $order->id }}</h1>
        <div class="bg-white p-6 rounded-lg shadow mb-6">
            <h2 class="text-2xl font-bold text-amber-800 mb-4">Order Info</h2>
            <p><strong>User:</strong> {{ $order->user->name ?? 'N/A' }} ({{ $order->user->email ?? 'N/A' }})</p>
            <p><strong>Total:</strong> ₱{{ number_format($order->total, 2) }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Billing:</strong> {{ $order->billing['fullName'] }} - {{ $order->billing['email'] }}</p>
            <p><strong>Date:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>

            <!-- Add this form for status update -->
            <form action="{{ route('admin.order.updateStatus', $order->id) }}" method="POST" class="mt-4">
                @csrf
                <label for="status" class="block text-sm font-medium text-gray-700">Update Status:</label>
                <select name="status" id="status" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                <button type="submit" class="mt-2 px-4 py-2 bg-amber-600 text-white rounded-md hover:bg-amber-700">Update Status</button>
            </form>

            @if (session('success'))
                <p class="mt-2 text-green-600">{{ session('success') }}</p>
            @endif
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-bold text-amber-800 mb-4">Items</h3>
            @if($order->items && $order->items->count() > 0)
                <ul class="space-y-2">
                    @foreach($order->items as $item)
                        <li>{{ $item->product->name ?? 'Product' }} (x{{ $item->quantity }}) - ₱{{ number_format($item->subtotal, 2) }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-600">No items found.</p>
            @endif
        </div>
        <a href="{{ route('admin.orders') }}" class="inline-block mt-6 px-6 py-3 bg-orange-600 text-white font-semibold rounded-full hover:bg-orange-700">Back to Orders</a>
    </main>
</body>
</html>