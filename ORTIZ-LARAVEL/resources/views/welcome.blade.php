<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Anicette Pastry Shop</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-yellow-50 font-[Nunito]">

    <!-- Navbar -->
    <header class="bg-yellow-100 shadow-md fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">
            
            <!-- Logo + Brand -->
            <div class="flex items-center space-x-3">
                <img src="/images/anicette-logo.jpg" alt="Anicette Logo" class="w-12 h-12 rounded-full shadow-md">
                <h1 class="font-[Parisienne] text-3xl text-yellow-800">Anicette</h1>
            </div>

            <!-- Navigation -->
            <nav class="hidden md:flex space-x-8 text-yellow-900 font-semibold">
                <a href="#" class="hover:text-yellow-700">Shop</a>
                <a href="#" class="hover:text-yellow-700">Products</a>
                <a href="#" class="hover:text-yellow-700">About Us</a>
                <a href="#" class="hover:text-yellow-700">Contact</a>
            </nav>

            <!-- Auth Buttons -->
            <div class="space-x-4">
                <a href="{{ route('login') }}" class="text-sm font-semibold text-yellow-800 hover:text-yellow-600">Log in</a>
                <a href="{{ route('register') }}" class="px-4 py-2 bg-yellow-700 text-white rounded-full text-sm font-semibold hover:bg-yellow-800">Register</a>
            </div>
        </div>
    </header>

     <!-- Hero Section with Background -->
        <section class="relative flex flex-col items-center justify-center text-center min-h-screen pt-24">
      <!-- Background Image -->
             <div class="absolute inset-0">
              <img src="/images/Anicette-welcomepage.jpeg" 
                 alt="Pastry Background" 
                 class="w-full h-full object-cover filter blur-sm">
        <!-- Overlay for readability -->
          <div class="absolute inset-0 bg-yellow-900/40"></div>
      </div>

    <!-- Content -->
         <div class="relative z-10 px-6">
          <h2 class="font-[Parisienne] text-5xl text-white drop-shadow-lg mb-4">Welcome to Anicette Pastry Shop</h2>
          <p class="max-w-2xl text-yellow-50 text-lg mb-8 drop-shadow-md">
            Freshly baked with love – from buttery croissants to rich chocolate cakes, 
            we bring sweetness and warmth to every bite.
         </p>
         <a href="#" class="px-6 py-3 bg-yellow-700 text-white rounded-full text-lg font-semibold hover:bg-yellow-800">Explore Our Shop</a>
         </div>
        </section>


    <!-- Footer -->
    <footer class="bg-yellow-100 shadow-inner py-6">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center px-6">
            
            <!-- Logo -->
            <div class="flex items-center space-x-3 mb-4 md:mb-0">
                <img src="/images/anicette-logo.jpg" alt="Anicette Logo" class="w-10 h-10 rounded-full shadow">
                <span class="font-[Parisienne] text-xl text-yellow-800">Anicette</span>
            </div>

            <!-- Social Media -->
            <div class="flex space-x-6">
                <a href="#"><img src="https://img.icons8.com/ios-filled/24/6B4226/facebook--v1.png" alt="Facebook"></a>
                <a href="#"><img src="https://img.icons8.com/ios-filled/24/6B4226/twitter--v1.png" alt="Twitter"></a>
                <a href="#"><img src="https://img.icons8.com/ios-filled/24/6B4226/instagram-new.png" alt="Instagram"></a>
            </div>
        </div>
        <p class="text-center text-sm text-yellow-800 mt-4">© 2025 Anicette Pastry Shop. All rights reserved.</p>
    </footer>

</body>
</html>
