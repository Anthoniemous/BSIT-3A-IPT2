<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - ShadyShop</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Figtree', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-gray-900">
                        Shady<span class="text-blue-600">Shop</span>
                    </a>
                </div>

                <!-- Navigation -->
                <nav class="flex items-center space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" 
                           class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition">
                            Dashboard
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" 
                                    class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" 
                           class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition">
                            Login
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" 
                               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium transition">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                    Welcome to <span class="text-yellow-300">ShadyShop</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-blue-100">
                    Discover amazing products at unbeatable prices
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#products" 
                       class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition shadow-lg">
                        <i class="fa-solid fa-shopping-bag mr-2"></i>Shop Now
                    </a>
                    @if (Route::has('register') && !Auth::check())
                        <a href="{{ route('register') }}" 
                           class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition">
                            <i class="fa-solid fa-user-plus mr-2"></i>Sign Up
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Featured Products
                </h2>
                <p class="text-gray-600 text-lg">
                    Explore our collection of premium products
                </p>
            </div>

            @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($products as $product)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            <!-- Product Image -->
                            <div class="relative h-48 bg-gray-200 overflow-hidden">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         alt="{{ $product->name }}"
                                         class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <i class="fa-solid fa-image text-5xl text-gray-400"></i>
                                    </div>
                                @endif
                                @if($product->quantity > 0)
                                    <span class="absolute top-2 right-2 bg-green-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                                        In Stock
                                    </span>
                                @else
                                    <span class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                                        Out of Stock
                                    </span>
                                @endif
                            </div>

                            <!-- Product Info -->
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-1">
                                    {{ $product->name }}
                                </h3>
                                <p class="text-sm text-gray-600 mb-3 line-clamp-2">
                                    {{ $product->description }}
                                </p>
                                <div class="flex items-center justify-between mb-3">
                                    <span class="text-2xl font-bold text-blue-600">
                                        ₱{{ number_format($product->price, 2) }}
                                    </span>
                                    <span class="text-sm text-gray-500">
                                        <i class="fa-solid fa-box mr-1"></i>{{ $product->quantity }} left
                                    </span>
                                </div>
                                <p class="text-xs text-gray-500 mb-3">
                                    <i class="fa-solid fa-tag mr-1"></i>{{ $product->category }}
                                </p>
                                @auth
                                    <a href="{{ route('user.products') }}" 
                                       class="block w-full bg-blue-600 hover:bg-blue-700 text-white text-center py-2 rounded-lg font-medium transition">
                                        <i class="fa-solid fa-cart-shopping mr-2"></i>View Details
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" 
                                       class="block w-full bg-blue-600 hover:bg-blue-700 text-white text-center py-2 rounded-lg font-medium transition">
                                        <i class="fa-solid fa-sign-in-alt mr-2"></i>Login to View
                                    </a>
                                @endauth
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fa-solid fa-box-open text-6xl text-gray-400 mb-4"></i>
                    <h3 class="text-2xl font-semibold text-gray-700 mb-2">No Products Available</h3>
                    <p class="text-gray-600">Check back soon for new products!</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- About -->
                <div>
                    <h3 class="text-xl font-bold mb-4">
                        Shady<span class="text-blue-400">Shop</span>
                    </h3>
                    <p class="text-gray-400 text-sm">
                        Your trusted online store for quality products at affordable prices. Shop with confidence and enjoy fast delivery.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li>
                            <a href="#products" class="text-gray-400 hover:text-white transition text-sm">
                                <i class="fa-solid fa-chevron-right mr-2 text-xs"></i>Products
                            </a>
                        </li>
                        @auth
                            <li>
                                <a href="{{ url('/dashboard') }}" class="text-gray-400 hover:text-white transition text-sm">
                                    <i class="fa-solid fa-chevron-right mr-2 text-xs"></i>Dashboard
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}" class="text-gray-400 hover:text-white transition text-sm">
                                    <i class="fa-solid fa-chevron-right mr-2 text-xs"></i>Login
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}" class="text-gray-400 hover:text-white transition text-sm">
                                    <i class="fa-solid fa-chevron-right mr-2 text-xs"></i>Register
                                </a>
                            </li>
                        @endauth
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li>
                            <i class="fa-solid fa-envelope mr-2"></i>support@shadyshop.com
                        </li>
                        <li>
                            <i class="fa-solid fa-phone mr-2"></i>+63 123 456 7890
                        </li>
                        <li>
                            <i class="fa-solid fa-location-dot mr-2"></i>Manila, Philippines
                        </li>
                    </ul>
                </div>

                <!-- Social Media -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition text-xl">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition text-xl">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-pink-500 transition text-xl">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-blue-600 transition text-xl">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-gray-800 mt-8 pt-8 text-center">
                <p class="text-gray-400 text-sm">
                    &copy; {{ date('Y') }} ShadyShop. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
