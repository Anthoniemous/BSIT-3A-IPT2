<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Orders</title>
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
        <h1 class="text-4xl font-extrabold text-amber-900 mb-8">Manage Orders</h1>
        <p class="text-lg mb-6">Total Orders: <strong>{{ $totalOrders }}</strong></p>
        <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-lg overflow-hidden">
            <table class="w-full table-auto">
                <thead class="bg-amber-700 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left">Order ID</th>
                        <th class="px-6 py-3 text-left">User</th>
                        <th class="px-6 py-3 text-left">Total</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-left">Date</th>
                        <th class="px-6 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr class="border-b">
                            <td class="px-6 py-4">{{ $order->id }}</td>
                            <td class="px-6 py-4">{{ $order->user->name ?? 'N/A' }}</td>
                            <td class="px-6 py-4">₱{{ number_format($order->total, 2) }}</td>
                            <td class="px-6 py-4">{{ ucfirst($order->status) }}</td>
                            <td class="px-6 py-4">{{ $order->created_at->format('Y-m-d') }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.order.details', $order->id) }}" class="text-blue-600 hover:underline">View Details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $orders->links() }}
        </div>
    </main>
</body>
</html>