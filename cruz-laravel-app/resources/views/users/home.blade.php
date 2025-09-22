<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simply Jopay</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
        }
    </style>
</head>
<body>
    <div class="relative min-h-screen text-gray-800">
        <!-- HEADER -->
        <header class="bg-white/90 shadow-md sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
                <!-- Logo + Name -->
                <div class="flex items-center space-x-2">
                    <a href="{{ url('/home') }}">
                        <img src="{{ asset('images/simplyjopay-logo.jpg') }}" 
                             alt="Simply Jopay Logo" 
                             class="h-12 w-12 object-cover rounded-full shadow-md">
                    </a>
                    <span class="text-3xl font-bold text-pink-600">Simply Jopay</span>
                </div>

                <!-- Navigation -->
                <nav class="hidden md:flex space-x-6 font-semibold text-gray-700">
                    <a href="#" class="hover:text-pink-500">Home</a>
                    <a href="#menu" class="hover:text-pink-500">Menu</a>
                    <a href="#about" class="hover:text-pink-500">About</a>
                    <a href="#contact" class="hover:text-pink-500">Contact</a>
                </nav>

                <!-- User Info -->
                <div class="flex items-center space-x-3">
                    <span class="font-semibold">Hi, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-pink-500 px-3 py-1 rounded-lg text-white hover:bg-pink-600">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- MAIN TWO-COLUMN LAYOUT -->
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 px-6 py-12">
            
            <!-- LEFT SIDE (Hero + About) -->
            <div class="flex flex-col gap-12">
                <!-- HERO SECTION -->
                <section class="relative rounded-2xl overflow-hidden shadow-lg">
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/jopay-hero.jpg') }}');"></div>
                    <div class="absolute inset-0 bg-white/70 backdrop-blur-sm"></div>
                    <div class="relative p-12 text-center">
                        <h1 class="text-5xl font-extrabold text-pink-600">Welcome to Simply Jopay</h1>
                        <p class="mt-4 text-lg text-gray-700">Serving Lumpiang Shanghai, Chorizo, Graham Bars, and more! 🍴✨</p>
                        <a href="#menu" class="mt-6 inline-block px-6 py-3 bg-pink-500 text-white rounded-full hover:bg-pink-600">Shop Now</a>
                    </div>
                </section>

                <!-- ABOUT SECTION -->
                <section id="about" class="bg-pink-50 rounded-2xl p-10 shadow-md">
                    <h2 class="text-3xl font-bold text-pink-600">About Simply Jopay</h2>
                    <p class="mt-4 text-gray-700 leading-relaxed">
                        Simply Jopay is your go-to food store for home-style favorites made with love. 
                        From crispy Lumpiang Shanghai to sweet Graham Bars, every bite brings joy and comfort.
                    </p>
                    <p class="mt-4 text-gray-700 leading-relaxed">
                        We believe food is not just about taste, but also about creating memories with every dish. 💖
                    </p>
                </section>
            </div>

            <!-- RIGHT SIDE (Featured Products) -->
            <main id="menu" class="flex flex-col">
                <h2 class="text-3xl font-bold text-center text-pink-600 mb-10">Our Favorites</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <!-- Card 1 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition">
                        <img src="{{ asset('images/lumpiang-shanghai.jpg') }}" class="w-full h-40 object-cover" alt="Lumpiang Shanghai">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-pink-600">Lumpiang Shanghai</h3>
                            <p class="text-gray-600 mt-2">Crispy golden rolls filled with flavorful meat and veggies.</p>
                            <button class="mt-4 bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600">Add to Cart</button>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition">
                        <img src="{{ asset('images/chorizo.jpeg') }}" class="w-full h-40 object-cover" alt="Chorizo">
                        <div class="p-6">
                            <h4 class="text-xl font-bold text-pink-600">Chorizo</h4>
                            <p class="text-gray-600 mt-2">Savory and perfectly seasoned homemade chorizo.</p>
                            <button class="mt-4 bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600">Add to Cart</button>
                        </div>
                    </div>

                    

                    <!-- Card 3 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition">
                        <img src="{{ asset('images/grahambar.jpeg') }}" class="w-full h-40 object-cover" alt="Graham Bar">
                        <div class="p-6">
                            <h5 class="text-xl font-bold text-pink-600">Graham Bar</h5>
                            <p class="text-gray-600 mt-2">Sweet, creamy, and crunchy layered graham goodness.</p>
                            <button class="mt-4 bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600">Add to Cart</button>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition">
                        <img src="{{ asset('images/adobo.jpeg') }}" class="w-full h-40 object-cover" alt="Adobo Manok">
                        <div class="p-6">
                            <h5 class="text-xl font-bold text-pink-600">Adobo Manok</h5>
                            <p class="text-gray-600 mt-2">
                                A classic Filipino dish made with tender chicken slow-cooked in soy sauce, vinegar, garlic, and spices — savory, tangy, and full of flavor.
                            </p>
                            <button class="mt-4 bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600">Add to Cart</button>
                        </div>
                    </div>

                </div>
            </main>
        </div>

        <!-- FOOTER -->
        <footer id="contact" class="bg-white text-center py-6 mt-10 shadow-inner">
            <p class="text-gray-600">&copy; {{ date('Y') }} Simply Jopay. All rights reserved.</p>
            <div class="flex justify-center gap-6 mt-3">
                <a href="#"><img src="https://img.icons8.com/ios-filled/24/fa314a/facebook--v1.png" alt="Facebook"></a>
                <a href="#"><img src="https://img.icons8.com/ios-filled/24/fa314a/instagram-new.png" alt="Instagram"></a>
                <a href="#"><img src="https://img.icons8.com/ios-filled/24/fa314a/twitter--v1.png" alt="Twitter"></a>
            </div>
        </footer>
    </div>
</body>
</html>
