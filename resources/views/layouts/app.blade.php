<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Food Hub') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind + Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white text-gray-900">

    <!-- Navbar -->
    <nav class="bg-green-600 text-white fixed top-0 w-full z-50 shadow-md">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center h-16">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="text-xl font-bold">Food Hub</a>

            <!-- Menu -->
            <div class="space-x-6 hidden sm:flex">
                <a href="{{ url('/') }}" class="hover:text-gray-200">Home</a>
                <a href="#menu" class="hover:text-gray-200">Menu</a>
                <a href="#about" class="hover:text-gray-200">About</a>
                <a href="#contact" class="hover:text-gray-200">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Background -->
    <header class="relative h-[500px] mt-16 bg-cover bg-center" style="background-image: url('{{ asset('images/hero-bg.jpg') }}');">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
            <div class="text-center text-white px-4">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Fresh. Organic. Healthy.</h1>
                <p class="mb-6 text-lg">Good food, made with love & nature's best ingredients.</p>
                <a href="#menu" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-3 rounded-md transition">
                    Order Now
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-12 px-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-green-600 text-white text-center py-4">
        <p class="text-sm">&copy; {{ date('Y') }} Food Hub 🍴 | All Rights Reserved</p>
    </footer>

</body>
</html>
