<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bonsai Landing</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-gradient-to-r from-[#556B2F] to-[#CBB67C] text-white">

  <!-- Header -->
  <header class="flex justify-between items-center px-10 py-6">
    <!-- Logo -->
    <div class="flex items-center space-x-2">
      <img src="{{ asset('images/Nature.png') }}" alt="Logo" class="w-10 h-10">
      <span class="text-2xl font-bold">Tiny Tree</span>
    </div>

    <!-- Navigation -->
    <nav class="hidden md:flex space-x-8 text-lg font-medium">
      <a href="#" class="hover:text-yellow-400">Home</a>
      <a href="#" class="hover:text-yellow-400">Gallery</a>
      <a href="#" class="hover:text-yellow-400">Contact Us</a>
    </nav>

    <!-- Auth Buttons -->
    <div class="space-x-4">
      @if (Route::has('login'))
        @auth
          <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-white text-[#556B2F] rounded-md font-semibold">Dashboard</a>
        @else
          <a href="{{ route('login') }}" class="px-4 py-2 bg-white text-[#556B2F] rounded-md font-semibold">Login</a>
          @if (Route::has('register'))
            <a href="{{ route('register') }}" class="px-4 py-2 bg-yellow-500 text-black rounded-md font-semibold">Register</a>
          @endif
        @endauth
      @endif
    </div>
  </header>

  <!-- Hero Section -->
  <main class="flex-1 flex flex-col lg:flex-row items-center justify-between px-10 py-16">
    <!-- Left Content -->
    <div class="max-w-xl text-left">
      <h1 class="text-8xl font-extrabold leading-tight">PLANTS <br><span class="text-yellow-400">BONSAI</span></h1>
      <p class="text-xl font-medium mt-8 mb-9">The fascinating and amazing world of Bonsai. Explore nature’s art, shaped with care and tradition.</p>
      <a href="#" class="px-6 py-3 bg-yellow-500 text-black rounded-md font-semibold">Shop Now</a>
    </div>

    <!-- Right Image -->
    <div class="mt-12 lg:mt-0 lg:ml-20">
      <img src="{{ asset('images/Nature.png') }}" alt="Bonsai Tree" class="rounded-lg shadow-xl w-[500px]">
    </div>
  </main>

</body>
</html>
