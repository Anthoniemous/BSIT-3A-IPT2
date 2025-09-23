<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aurora Jewelry</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-blue-900 to-blue-700 text-white font-sans">

    <!-- Hero Section -->
  <section class="relative w-full h-screen bg-cover bg-center" 
         style="background-image: url('/images/bg-ofarora.jpg');">
       
        <div class="relative z-10 flex flex-col justify-center h-full px-12 max-w-xl">
            <!-- Text content -->
            <p class="text-sm uppercase mb-2 text-white/80">Welcome Offer</p>
            <h1 class="text-4xl md:text-5xl font-semibold mb-4 text-white">Get 20% Off Your First Order</h1>
            <p class="text-sm mb-6 text-white/80">Get your promo code and apply it at checkout</p>

            <!-- Buttons -->
            <div class="flex space-x-4">
                <a href="{{ route('login') }}" class="px-6 py-3 bg-white text-blue-900 font-semibold rounded hover:bg-blue-100 transition">Log In</a>
                <a href="{{ route('register') }}" class="px-6 py-3 border border-white text-white font-semibold rounded hover:bg-white hover:text-blue-900 transition">Register</a>
            </div>
        </div>
    </section>

</body>
</html>
