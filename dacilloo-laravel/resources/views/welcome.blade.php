<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sheila Florist</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-r from-gray-700 via-gray-800 to-gray-900 text-white">

    <!-- Navbar -->
    <nav class="bg-pink-600 px-6 py-4 flex justify-between items-center shadow-md">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <span class="text-2xl font-bold italic">🌸 Sheila Florist</span>
        </div>

        <!-- Links -->
        <div class="hidden md:flex space-x-6 text-white font-medium">
            <a href="{{ url('/') }}" class="hover:text-gray-200">Home</a>
            <a href="#featured" class="hover:text-gray-200">Featured</a>
            <a href="#contact" class="hover:text-gray-200">Contact Us</a>
        </div>

        <!-- Auth -->
        <div class="flex space-x-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" 
                       class="px-4 py-2 bg-white text-pink-600 font-semibold rounded-lg hover:bg-gray-100">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" 
                       class="px-4 py-2 bg-white text-pink-600 font-semibold rounded-lg hover:bg-gray-100">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" 
                           class="px-4 py-2 bg-pink-700 text-white font-semibold rounded-lg hover:bg-pink-800">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative h-[90vh] flex items-center justify-center text-center bg-cover bg-center" 
        style="background-image: url('/image/flower.png');">
        <div class="bg-black bg-opacity-60 absolute inset-0"></div>
        <div class="relative z-10 max-w-2xl">
            <h3 class="text-lg italic">Every Special Holiday</h3>
            <h1 class="text-4xl md:text-5xl font-bold mt-2">Customize your <span class="text-pink-400">bunch</span></h1>
            <p class="mt-4 text-lg">Select flowers you love, packing you want</p>
            <p class="text-sm mt-1">Offer anytime you want</p>
            <a href="#featured" 
               class="mt-6 inline-block bg-pink-600 hover:bg-pink-700 text-white px-6 py-3 rounded-lg font-semibold">
                Explore more
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-6 text-center text-gray-400 text-sm">
    </footer>
</body>
</html>
