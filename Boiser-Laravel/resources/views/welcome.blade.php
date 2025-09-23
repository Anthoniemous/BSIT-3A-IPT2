<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Archiora - Modern Shopping</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind (Vite in Laravel, but for static you can use CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100 font-inter">

    <!-- Navbar -->
    <header class="bg-gray-800 shadow sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-0.5">
                <img src="{{ asset('images/logo.png') }}" alt="App Logo" class="h-10 w-10">
                <span class="text-xl font-bold text-[#b7bcd0]">rchiora</span>
            </a>

            <!-- Search -->
            <div class="hidden md:block flex-1 mx-6">
                <input type="text" placeholder="Search for products..."
                    class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 text-white focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <!-- Navigation -->
            <nav class="flex items-center space-x-6">
                <a href="#" class="text-gray-300 hover:text-indigo-400">Home</a>
                <a href="#categories" class="text-gray-300 hover:text-indigo-400">Categories</a>
                <a href="#products" class="text-gray-300 hover:text-indigo-400">Shop</a>
                <a href="#contact" class="text-gray-300 hover:text-indigo-400">Contact</a>

                <!-- Auth Buttons -->
                <a href="/login"
                   class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    Login
                </a>
                <a href="/register"
                   class="px-4 py-2 bg-gray-700 text-gray-200 rounded-lg hover:bg-gray-600 transition">
                    Register
                </a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative text-white min-h-[90vh] flex items-center justify-center overflow-hidden">

        <!-- Background Gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-gray-800 to-black"></div>

        <!-- Overlay Image (subtle blend) -->
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1618354691437-c6523c5d9819?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80"
                 class="w-full h-full object-cover opacity-40 mix-blend-overlay">
        </div>

        <!-- Gradient Accent Blobs -->
        <div class="absolute -top-32 -left-32 w-[500px] h-[500px] bg-gradient-to-tr from-indigo-600/40 to-pink-500/30 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-[-150px] right-[-150px] w-[400px] h-[400px] bg-gradient-to-br from-purple-500/40 to-indigo-400/30 rounded-full blur-2xl animate-pulse delay-150"></div>

        <!-- Content -->
        <div class="relative z-10 max-w-5xl text-center px-6">

    <!-- Title -->
    <h1 class="text-5xl md:text-7xl font-extrabold leading-tight mb-6">
        Discover <span class="text-[#b7bcd0]">Archiora Lifestyle</span>
    </h1>

    <!-- Subtitle -->
    <p class="text-lg md:text-xl text-gray-300 mb-10 max-w-2xl mx-auto">
        From timeless <span class="text-white font-semibold">fashion</span> and cutting-edge 
        <span class="text-white font-semibold">technology</span> to stylish 
        <span class="text-white font-semibold">home essentials</span> —  
        Archiora brings the world’s best products straight to your fingertips.
    </p>

    <!-- CTA Buttons -->
    <div class="flex flex-wrap justify-center gap-4">
        <a href="#products"
           class="px-8 py-3 bg-indigo-600 text-white font-semibold rounded-full shadow-lg hover:shadow-indigo-500/40 hover:bg-indigo-700 transition duration-300 ease-in-out transform hover:-translate-y-1">
            🛒 Shop Now
        </a>
        <a href="#categories"
           class="px-8 py-3 bg-white/10 text-white font-semibold rounded-full border border-white/30 backdrop-blur-md hover:bg-white/20 transition duration-300 ease-in-out">
            Browse Categories
        </a>
    </div>
</div>

    </section>

    <!-- Categories Section -->
    <section id="categories" class="py-16 bg-gray-900">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-2xl font-bold text-white">Shop by Category</h3>
                <a href="/categories"
                   class="text-indigo-400 hover:text-indigo-300 text-sm font-medium">
                   View All →
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Example Categories -->
                <div class="bg-gray-800 rounded-xl p-6 flex flex-col items-center hover:scale-105 transform transition cursor-pointer">
                    <img src="https://cdn-icons-png.flaticon.com/512/892/892458.png" class="w-20 h-20 mb-4" alt="Fashion">
                    <h4 class="text-white text-xl font-bold">Fashion</h4>
                </div>
                <div class="bg-gray-800 rounded-xl p-6 flex flex-col items-center hover:scale-105 transform transition cursor-pointer">
                    <img src="https://cdn-icons-png.flaticon.com/512/3081/3081823.png" class="w-20 h-20 mb-4" alt="Electronics">
                    <h4 class="text-white text-xl font-bold">Electronics</h4>
                </div>
                <div class="bg-gray-800 rounded-xl p-6 flex flex-col items-center hover:scale-105 transform transition cursor-pointer">
                    <img src="https://cdn-icons-png.flaticon.com/512/1046/1046895.png" class="w-20 h-20 mb-4" alt="Home & Living">
                    <h4 class="text-white text-xl font-bold">Home & Living</h4>
                </div>
                <div class="bg-gray-800 rounded-xl p-6 flex flex-col items-center hover:scale-105 transform transition cursor-pointer">
                    <img src="https://cdn-icons-png.flaticon.com/512/1165/1165674.png" class="w-20 h-20 mb-4" alt="Sports">
                    <h4 class="text-white text-xl font-bold">Sports</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section id="products" class="py-16 bg-gray-800">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-2xl font-bold text-white">Featured Products</h3>
                <a href="/products"
                   class="text-indigo-400 hover:text-indigo-300 text-sm font-medium">
                   View All →
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Example Product -->
                <div class="bg-gray-900 border border-gray-700 rounded-xl overflow-hidden hover:shadow-xl transition p-6 flex flex-col items-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/3523/3523063.png" alt="Wireless Headphones" class="w-24 h-24 mb-4">
                    <h4 class="text-lg font-semibold text-white">Wireless Headphones</h4>
                    <p class="text-gray-400">$59.99</p>
                    <div class="flex items-center mt-2 text-yellow-400 text-sm">★★★★☆</div>
                    <button class="mt-3 w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">
                        Add to Cart
                    </button>
                </div>

                <div class="bg-gray-900 border border-gray-700 rounded-xl overflow-hidden hover:shadow-xl transition p-6 flex flex-col items-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/1046/1046784.png" alt="Smart Watch" class="w-24 h-24 mb-4">
                    <h4 class="text-lg font-semibold text-white">Smart Watch</h4>
                    <p class="text-gray-400">$129.99</p>
                    <div class="flex items-center mt-2 text-yellow-400 text-sm">★★★★☆</div>
                    <button class="mt-3 w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">
                        Add to Cart
                    </button>
                </div>

                <div class="bg-gray-900 border border-gray-700 rounded-xl overflow-hidden hover:shadow-xl transition p-6 flex flex-col items-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/3037/3037198.png" alt="Running Shoes" class="w-24 h-24 mb-4">
                    <h4 class="text-lg font-semibold text-white">Running Shoes</h4>
                    <p class="text-gray-400">$89.99</p>
                    <div class="flex items-center mt-2 text-yellow-400 text-sm">★★★★★</div>
                    <button class="mt-3 w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">
                        Add to Cart
                    </button>
                </div>

                <div class="bg-gray-900 border border-gray-700 rounded-xl overflow-hidden hover:shadow-xl transition p-6 flex flex-col items-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/3081/3081823.png" alt="Laptop" class="w-24 h-24 mb-4">
                    <h4 class="text-lg font-semibold text-white">Laptop</h4>
                    <p class="text-gray-400">$999.99</p>
                    <div class="flex items-center mt-2 text-yellow-400 text-sm">★★★★☆</div>
                    <button class="mt-3 w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-gray-950 text-gray-400 py-12">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h4 class="font-bold text-white mb-3">Archiora</h4>
                <p>Your one-stop online shopping destination.</p>
            </div>
            <div>
                <h4 class="font-bold text-white mb-3">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-white">Home</a></li>
                    <li><a href="#products" class="hover:text-white">Shop</a></li>
                    <li><a href="#categories" class="hover:text-white">Categories</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-white mb-3">Customer Care</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-white">Help Center</a></li>
                    <li><a href="#" class="hover:text-white">Returns</a></li>
                    <li><a href="#" class="hover:text-white">Shipping Info</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-white mb-3">Newsletter</h4>
                <form action="#" class="flex">
                    <input type="email" placeholder="Enter your email"
                           class="w-full px-3 py-2 rounded-l-lg text-gray-800 focus:outline-none">
                    <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-r-lg hover:bg-indigo-700">
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
            &copy; 2025 Archiora. All rights reserved.
        </div>
    </footer>

</body>
</html>
