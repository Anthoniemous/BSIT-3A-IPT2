<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - User Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

            <nav class="flex-1 px-4 py-6 space-y-2">
                <!-- Dashboard Link -->
                <a href="{{ route('user.dashboard') }}" 
                class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-800 transition
                        {{ request()->routeIs('user.dashboard') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:text-white' }}">
                    <span class="flex items-center justify-center w-5">
                        <i class="fa-solid fa-house"></i>
                    </span>
                    <span>Dashboard</span>
                </a>

                <!-- Products Link -->
                <a href="{{ route('user.products') }}" 
                class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-800 transition
                        {{ request()->routeIs('user.products') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:text-white' }}">
                    <span class="flex items-center justify-center w-5">
                        <i class="fa-solid fa-box"></i>
                    </span>
                    <span>All Products</span>
                </a>

                <!-- Settings Link -->
                <a href="{{ route('profile.edit') }}" 
                class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-800 transition
                        {{ request()->routeIs('profile.edit') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:text-white' }}">
                    <span class="flex items-center justify-center w-5">
                       <i class="fa-solid fa-gear"></i>
                    </span>
                    <span>Settings</span>
                </a>
            </nav>

            <div class="border-t border-gray-700 p-4">
                @auth
                    <div class="flex items-center space-x-3 mb-3">
                        @if(Auth::user()->image)
                            <img src="{{ asset('storage/' . Auth::user()->image) }}" 
                                 alt="{{ Auth::user()->name }}"
                                 class="w-10 h-10 rounded-full object-cover">
                        @else
                            <div class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center">
                                <i class="fa-solid fa-user text-gray-400"></i>
                            </div>
                        @endif
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-white truncate">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-400 truncate">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-sm text-red-400 hover:text-red-600 text-left px-3 py-2 rounded hover:bg-gray-800 transition">
                            <i class="fa-solid fa-sign-out-alt mr-2"></i>Logout
                        </button>
                    </form>
                @endauth
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 ml-64 p-6 overflow-y-auto">
            <header class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">
                    {{ $header ?? 'User Dashboard' }}
                </h2>
            </header>

            <main>
                {{ $slot }}
            </main>
        </div>
    </div>

</body>
</html>
