<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">

    <!-- Sidebar Layout -->
    <div class="flex h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-gray-100 flex flex-col fixed h-full">
            <div class="flex items-center justify-center h-16 border-b border-gray-700">
                <h1 class="text-xl font-semibold text-white">Shady<span class="text-blue-500">Shop</span></h1>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-2 ">
                <!-- Dashboard Link -->
                <a href="{{ url('/dashboard') }}" 
                class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-800 transition
                        {{ request()->is('dashboard') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:text-white' }}">
                    <span class="flex items-center justify-center w-5">
                        <i class="fa-solid fa-house"></i>
                    </span>
                    <span>Dashboard</span>
                </a>

                <!-- Product Link -->
                <a href="{{ url('/product') }}" 
                class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-800 transition
                        {{ request()->is('product') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:text-white' }}">
                    <span class="flex items-center justify-center w-5">
                        <i class="fa-solid fa-box"></i>
                    </span>
                    <span>Product</span>
                </a>

                 <!-- category -->
                 <a href="{{ url('/category') }}" 
                class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-800 transition
                        {{ request()->is('category') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:text-white' }}">
                    <span class="flex items-center justify-center w-5">
                       <i class="fa-solid fa-layer-group"></i>
                    </span>
                    <span>Category</span>
                </a>

                 <!-- Customer -->
                 <a href="{{ url('/customer') }}" 
                class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-800 transition
                        {{ request()->is('customer') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:text-white' }}">
                    <span class="flex items-center justify-center w-5">
                       <i class="fa-solid fa-users"></i>
                    </span>
                    <span>Customer</span>
                </a>

                  <!-- Orders -->
                 <a href="{{ url('/order') }}" 
                class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-800 transition
                        {{ request()->is('orders') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:text-white' }}">
                    <span class="flex items-center justify-center w-5">
                       <i class="fa-solid fa-receipt"></i>
                    </span>
                    <span>Orders</span>
                </a>

                <!-- settings -->
                <a href="{{ url('/settings') }}" 
                class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-800 transition
                        {{ request()->is('settings') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:text-white' }}">
                    <span class="flex items-center justify-center w-5">
                       <i class="fa-solid fa-gear"></i>
                    </span>
                    <span>Settings</span>
                </a>
            </nav>

            <div class="border-t border-gray-700 p-4">
                @auth
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-300">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm text-red-400 hover:text-red-600">Logout</button>
                        </form>
                    </div>
                @endauth
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 ml-64 p-6 overflow-y-auto">
            <header class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">
                    {{ $header ?? 'Dashboard' }}
                </h2>
            </header>

            <main>
                {{ $slot }}
            </main>
        </div>
    </div>

</body>
</html>
