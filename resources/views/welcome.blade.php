<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Archiora Pets - Pawfect Shopping</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-amber-50 text-gray-800 font-poppins">

    <!-- Navbar -->
    <header class="bg-orange-700/90 backdrop-blur-md shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-2">
                <img src="{{ asset('images/logo.png') }}" alt="App Logo" class="h-10 w-10">
                <span class="text-2xl font-bold text-white drop-shadow">Archiora Pets</span>
            </a>

            <!-- Search -->
            <div class="hidden md:block flex-1 mx-6">
                <input type="text" placeholder="Search pet toys, treats, or accessories..."
                    class="w-full px-4 py-2 rounded-full bg-orange-100/80 border border-orange-300 text-gray-800 focus:ring-2 focus:ring-orange-400 focus:outline-none placeholder-gray-500">
            </div>

            <!-- Navigation -->
            <nav class="flex items-center space-x-5">
                <a href="#" class="text-orange-100 hover:text-white transition">Home</a>
                <a href="#categories" class="text-orange-100 hover:text-white transition">Categories</a>
                <a href="#products" class="text-orange-100 hover:text-white transition">Shop</a>
                <a href="#contact" class="text-orange-100 hover:text-white transition">Contact</a>

                <!-- Login Dropdown -->
                <div class="relative inline-block text-left group">
                    <a href="#" class="px-4 py-2 bg-white text-orange-700 rounded-full font-medium hover:bg-orange-50 transition">
                        Login
                    </a>
                    <div class="absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg ring-1 ring-black ring-opacity-5
                                opacity-0 scale-95 transform transition-all duration-200 origin-top-right
                                group-hover:opacity-100 group-hover:scale-100 group-hover:visible invisible">
                        <a href="/login" class="block px-4 py-2 text-gray-700 hover:bg-orange-50 rounded-t-lg">User Login</a>
                        <a href="/login/admin" class="block px-4 py-2 text-gray-700 hover:bg-orange-50 rounded-b-lg">Admin Login</a>
                    </div>
                </div>

                <a href="/register" class="px-4 py-2 bg-orange-100 text-orange-800 rounded-full border border-orange-300 hover:bg-orange-200 transition">
                    Register
                </a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-12 bg-gradient-to-r from-orange-200 via-amber-100 to-yellow-100">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-10 px-6">
            <div class="text-center md:text-left">
                <h1 class="text-4xl font-bold text-orange-800">🐾 Discover Paw-some Deals!</h1>
                <p class="mt-3 text-lg text-gray-700">Find everything your furry friend will love — from toys to treats!</p>
                <a href="{{ route('dashboard') }}"
                   class="inline-block mt-6 px-6 py-3 bg-orange-600 text-white font-semibold rounded-full shadow hover:bg-orange-700 transition">
                    Start Shopping
                </a>
            </div>
            <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png"
                 alt="Pet Illustration"
                 class="w-52 md:w-64 drop-shadow-lg">
        </div>
    </section>

    <!-- Categories -->
    <section id="categories" class="max-w-7xl mx-auto px-6 py-10">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-semibold text-orange-800">🐶 Shop by Category</h3>
            <a href="{{ route('services') }}" class="text-sm text-orange-600 hover:underline">View all</a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <a href="#" class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition text-center">
                🦴 <p class="mt-2 font-semibold text-orange-700">Treats</p>
            </a>
            <a href="#" class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition text-center">
                🎾 <p class="mt-2 font-semibold text-orange-700">Toys</p>
            </a>
            <a href="#" class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition text-center">
                🐕‍🦺 <p class="mt-2 font-semibold text-orange-700">Accessories</p>
            </a>
            <a href="#" class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition text-center">
                🛏 <p class="mt-2 font-semibold text-orange-700">Beds & Houses</p>
            </a>
        </div>
    </section>

    <!-- Featured Products -->
    <section id="products" class="max-w-7xl mx-auto px-6 py-10">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-semibold text-orange-800">✨ Featured Pet Products</h3>
            <a href="{{ route('services') }}" class="text-sm text-orange-600 hover:underline">View all</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/616/616430.png" alt="Product" class="w-28 mx-auto">
                <h4 class="mt-4 font-semibold text-orange-800">Chew Toy</h4>
                <p class="text-gray-600">$12.99</p>
                <button class="mt-3 bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600">Add to Cart</button>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="Product" class="w-28 mx-auto">
                <h4 class="mt-4 font-semibold text-orange-800">Cat Collar</h4>
                <p class="text-gray-600">$8.99</p>
                <button class="mt-3 bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600">Add to Cart</button>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="Product" class="w-28 mx-auto">
                <h4 class="mt-4 font-semibold text-orange-800">Dog Bed</h4>
                <p class="text-gray-600">$29.99</p>
                <button class="mt-3 bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600">Add to Cart</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-orange-100 text-gray-700 py-12 mt-10">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h4 class="font-bold text-orange-800 mb-3">Archiora Pets</h4>
                <p>Bringing love, care, and joy to every pet household. 🐾</p>
            </div>
            <div>
                <h4 class="font-bold text-orange-800 mb-3">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-orange-600">Home</a></li>
                    <li><a href="#products" class="hover:text-orange-600">Shop</a></li>
                    <li><a href="#categories" class="hover:text-orange-600">Categories</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-orange-800 mb-3">Customer Care</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-orange-600">Help Center</a></li>
                    <li><a href="#" class="hover:text-orange-600">Returns</a></li>
                    <li><a href="#" class="hover:text-orange-600">Shipping Info</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-orange-800 mb-3">Newsletter</h4>
                <form action="#" class="flex">
                    <input type="email" placeholder="Enter your email"
                           class="w-full px-3 py-2 rounded-l-full text-gray-800 focus:outline-none border border-orange-300">
                    <button type="submit"
                            class="px-4 py-2 bg-orange-500 text-white rounded-r-full hover:bg-orange-600">
                        Subscribe
                    </button>   
                </form>
                <div class="mt-4 flex space-x-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/196/196578.png" class="w-10 h-6" alt="Visa">
                    <img src="https://cdn-icons-png.flaticon.com/512/349/349221.png" class="w-10 h-6" alt="Mastercard">
                    <img src="https://cdn-icons-png.flaticon.com/512/196/196565.png" class="w-10 h-6" alt="PayPal">
                </div>
            </div>
        </div>
        <div class="mt-10 text-center text-sm text-gray-500">
            &copy; 2025 Archiora Pets. All rights reserved. 🐾
        </div>
    </footer>

</body>
</html>
