<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Homepage</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="relative min-h-screen font-[Poppins]">

    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="{{ asset('images/homepage-bg.jpg') }}" 
             alt="Salon Background" 
             class="w-full h-full object-cover">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/40"></div>
    </div>

    <!-- Navigation -->
    <header class="relative z-10 bg-transparent text-white">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo / Title -->
            <h1 class="text-2xl font-bold tracking-wide">
                <span class="text-pink-400">Salon Luxe</span>
            </h1>

            <!-- Nav Links -->
            <nav class="hidden md:flex gap-8 text-lg font-medium">
                <a href="#" class="hover:text-pink-400 transition">Home</a>
                <a href="#" class="hover:text-pink-400 transition">Services</a>
                <a href="#" class="hover:text-pink-400 transition">About</a>
                <a href="#" class="hover:text-pink-400 transition">Contact</a>
            </nav>

            <!-- Auth Buttons -->
            <div class="flex gap-4">
                <a href="{{ route('login') }}" 
                   class="px-4 py-2 rounded-full border-2 border-pink-400 text-pink-400 font-semibold hover:bg-pink-500 hover:text-white transition">
                   Login
                </a>
                <a href="{{ route('register') }}" 
                   class="px-4 py-2 rounded-full bg-pink-500 text-white font-semibold shadow hover:bg-pink-600 transition">
                   Register
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Content (optional, still centered) -->
    <div class="relative z-10 flex items-center justify-center text-center min-h-[80vh] px-4">
        <div class="space-y-6 text-white">
            <h2 class="text-4xl md:text-5xl font-bold drop-shadow-lg">
                Beauty, comfort, and style — <span class="text-pink-400">redefined</span>.
            </h2>
            <p class="text-lg md:text-xl max-w-2xl mx-auto text-gray-200">
                Discover premium salon services tailored just for you.
            </p>
        </div>
    </div>

</body>
</html>
