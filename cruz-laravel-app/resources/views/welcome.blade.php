<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Store | Welcome</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Quicksand', sans-serif;
    }
    h1, h2 {
      font-family: 'Dancing Script', cursive;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-pink-50 to-white min-h-screen flex flex-col">

    <!-- Top bar -->
  <header class="flex justify-between items-center px-8 py-4 bg-white shadow-md fixed w-full z-50">
    
      <!-- Navigation -->
      <nav class="hidden md:flex gap-6 text-gray-700 font-semibold">
        <a href="#" class="hover:text-pink-500">Menu</a>
        <a href="#" class="hover:text-pink-500">Deals</a>
        <a href="#" class="hover:text-pink-500">About</a>
        <a href="#" class="hover:text-pink-500">Contact</a>
      </nav>
    </div>

    <!-- Right: Auth Buttons -->
    <div class="space-x-4">
      <a href="/login" class="text-pink-600 font-semibold hover:underline">Login</a>
      <a href="/register" class="px-4 py-2 bg-pink-500 text-white rounded-full hover:bg-pink-600">Register</a>
    </div>
  </header>


  <!-- Hero Section -->
  <section class="flex-1 flex flex-col md:flex-row items-center justify-center px-8 mt-20">
    <!-- Left: Food Images -->
    <div class="w-full md:w-1/2 grid grid-cols-2 gap-4 p-6">
      <img src="/images/lumpiang-shanghai.jpg" alt="Lumpiang Shanghai" class="rounded-2xl shadow-lg hover:scale-105 transition">
      <img src="https://images.unsplash.com/photo-1562967914-608f82629710?w=500" alt="Chorizo" class="rounded-2xl shadow-lg hover:scale-105 transition">
      <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=500" alt="Graham Bar" class="rounded-2xl shadow-lg hover:scale-105 transition">
      <img src="https://images.unsplash.com/photo-1551782450-a2132b4ba21d?w=500" alt="Burger" class="rounded-2xl shadow-lg hover:scale-105 transition">
    </div>

   <!-- Right: Hero Content -->
        <div class="w-full md:w-1/2 flex flex-col items-start text-left px-6">
        <div class="flex items-center gap-3 mb-6">
            <img src="/images/simplyjopay-logo.jpg" alt="Logo" class="w-12 h-12 rounded-full shadow-md">
            <span class="text-4xl font-bold text-pink-600">Food Store</span>
        </div>
        <!-- Changed font to normal sans-serif -->
        <h1 class="text-6xl text-pink-600 drop-shadow mb-6 font-sans">
            Welcome to Simply Jopay
        </h1>
        <p class="max-w-xl text-gray-600 text-lg mb-8">
            Discover fresh meals, sweet desserts, and everything delicious — made with love just for you.🍴✨
        </p>
        <a href="#explore" class="px-8 py-3 bg-pink-500 text-white text-lg rounded-full shadow hover:bg-pink-600 transition">
            Explore Menu
        </a>
        </div>
    </section>

  <!-- Footer -->
  <footer class="bg-white shadow-inner py-6 text-center">
    <p class="text-gray-500 text-sm">© 2025 Food Store. Serving happiness every day.</p>
    <div class="flex justify-center gap-6 mt-3">
      <a href="#"><img src="https://img.icons8.com/ios-filled/24/fa314a/facebook--v1.png" alt="Facebook"></a>
      <a href="#"><img src="https://img.icons8.com/ios-filled/24/fa314a/instagram-new.png" alt="Instagram"></a>
      <a href="#"><img src="https://img.icons8.com/ios-filled/24/fa314a/twitter--v1.png" alt="Twitter"></a>
    </div>
  </footer>

</body>
</html>
