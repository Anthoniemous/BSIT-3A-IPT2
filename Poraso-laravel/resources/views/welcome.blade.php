<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wireless Headphones</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #1a1a1a;
            color: #fff;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    <!-- Navbar -->
    <header class="flex justify-between items-center px-10 py-6">
        <div class="text-xl font-bold tracking-wide">🎧 CINE <span class="text-gray-400">MARKET</span></div>

        <nav class="hidden md:flex gap-8 text-sm">
            <a href="#" class="hover:text-pink-400">Home</a>
            <a href="#" class="hover:text-pink-400">About</a>
            <a href="#" class="hover:text-pink-400">Features</a>
            <a href="#" class="hover:text-pink-400">Contact</a>
        </nav>

        <div class="flex gap-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}" class="px-4 py-2 text-sm bg-pink-500 rounded-lg hover:bg-pink-600">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 text-sm bg-gray-800 rounded-lg hover:bg-gray-700">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 text-sm bg-pink-500 rounded-lg hover:bg-pink-600">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </header>

    <!-- Hero Section -->
    <main class="flex-1 flex flex-col md:flex-row items-center justify-between px-10 py-16">
        <!-- Left Text -->
        <div class="max-w-lg">
            <h1 class="text-5xl font-extrabold leading-tight mb-6">Cine<br> <span class="text-pink-500">Headphone Store</span></h1>
            <p class="text-gray-400 mb-6">Cine headphones offers premium wireless headphones that combine style, comfort, and powerful sound — perfect for music lovers, gamers, and professionals.</p>
            <a href="#tienda" class="bg-pink-500 hover:bg-pink-600 text-white font-semibold px-6 py-3 rounded-lg">Toplok Me</a>
        </div>

        <!-- Right Image -->
        <div class="mt-10 md:mt-0">
            <img src="{{ asset('image/1.png') }}" alt="Wireless Headphones" class="w-[450px] mx-auto">
        </div>
    </main>

    <!-- Featured Products -->
    <section class="bg-black px-10 py-10">
        <h2 class="text-lg font-semibold mb-6">Products</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center">
                <img src="{{ asset('image/2.png') }}" class="mx-auto w-28" alt="">
                <p class="mt-2 text-gray-300">$55.00 <span class="block text-sm text-gray-500">Red</span></p>
            </div>
            <div class="text-center">
                <img src="{{ asset('image/3.png') }}" class="mx-auto w-28" alt="">
                <p class="mt-2 text-gray-300">$65.00 <span class="block text-sm text-gray-500">Blue</span></p>
            </div>
            <div class="text-center">
                <img src="{{ asset('image/4.png') }}" class="mx-auto w-28" alt="">
                <p class="mt-2 text-gray-300">$55.00 <span class="block text-sm text-gray-500">Silver</span></p>
            </div>
            <div class="text-center">
                <img src="{{ asset('image/1.png') }}" class="mx-auto w-28" alt="">
                <p class="mt-2 text-gray-300">$60.00 <span class="block text-sm text-gray-500">White</span></p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-6 text-gray-500 text-sm">
        © {{ date('Y') }} Cine Headphones. All rights reserved.
    </footer>

</body>
</html>
