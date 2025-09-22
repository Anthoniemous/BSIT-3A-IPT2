<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Makeup Haven</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-50">

  <!-- Header -->
  <header class="absolute top-0 left-0 w-full z-20">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
      <!-- Logo -->
      <div class="text-2xl font-bold text-white">Makeup Haven</div>

      <!-- Navigation -->
      <nav class="hidden md:flex space-x-8 text-white font-medium">
        <a href="#" class="hover:text-rose-300 transition">Home</a>
        <a href="#" class="hover:text-rose-300 transition">Products</a>
        <a href="#" class="hover:text-rose-300 transition">About</a>
        <a href="#" class="hover:text-rose-300 transition">Contact</a>
      </nav>

      <!-- Auth Buttons -->
      <div class="space-x-3">
        <a href="/login" class="px-4 py-2 rounded-full bg-white/20 text-white font-medium hover:bg-white/40 transition">
          Login
        </a>
        <a href="/register" class="px-4 py-2 rounded-full bg-rose-500 text-white font-medium shadow hover:bg-rose-600 transition">
          Register
        </a>
      </div>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="relative h-screen flex items-center justify-center">
    <!-- Background Image -->
    <div class="absolute inset-0">
      <img src="{{asset('images/bg.jpg')}}" 
           alt="Makeup Background" 
           class="w-full h-full object-cover">
      <div class="absolute inset-0 bg-black/50"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 max-w-4xl text-center px-6">
      <h1 class="text-4xl lg:text-6xl font-extrabold text-white drop-shadow-lg">
        Discover Your Inner Glow
      </h1>
      <p class="mt-6 text-lg text-gray-200">
        Makeup Haven is your trusted space to explore beauty, self-care, and the latest trends in cosmetics. 
        Elevate your style with confidence.
      </p>
      <div class="mt-8">
        <a href="/register" class="px-6 py-3 rounded-full bg-rose-500 text-white font-semibold shadow-lg hover:bg-rose-600 transition">
          Get Started
        </a>
      </div>
    </div>
  </section>

</body>
</html>
