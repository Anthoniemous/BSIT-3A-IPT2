<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anicette</title>
    @vite('resources/css/app.css')
</head>
<body>
    <!-- Background -->
    <div class="relative min-h-screen text-gray-800">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/pastry-bg.jpg') }}');"></div>
        <div class="absolute inset-0 bg-white/70 backdrop-blur-sm"></div>

        <!-- Content -->
        <div class="relative z-10">
            <!-- Header -->
                  <header class="bg-amber-100 shadow-md">
                     <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
                    
                    <!-- Logo -->
                    <div class="flex items-center space-x-1">
                        <a href="{{ url('/home') }}">
                            <img src="{{ asset('images/anicette-logo.jpg') }}" 
                                alt="Anicette Logo" 
                                class="h-12 w-12 object-cover rounded-full">
                        </a>
                        <span class="font-[Parisienne] text-3xl text-yellow-800">Anicette</span>
                    </div>

                   <!-- Center Navigation + Search -->
                    <div class="flex items-center space-x-8">
                        <!-- Navigation -->
                        <nav class="flex space-x-6">
                            <a href="#" class="hover:text-amber-700">Home</a>
                            <a href="#" class="hover:text-amber-700">Menu</a>
                            <a href="#" class="hover:text-amber-700">About</a>
                            <a href="#" class="hover:text-amber-700">Contact</a>
                        </nav>
                                
                          <!-- Search Bar -->
                        <form action="#" method="GET" class="flex items-center">
                            <input 
                                type="text" 
                                placeholder="Search pastries, cakes, or breads..." 
                                class="h-10 px-4 w-64 rounded-l-full border border-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-yellow-600"
                            >
                            <button 
                                type="submit"
                                class="h-10 px-6 bg-yellow-900 text-white font-semibold rounded-r-full hover:bg-yellow-700 transition shadow-md"
                            >
                                Search
                            </button>
                        </form>
                    </div>



                    <!-- User Info -->
                    <div class="flex items-center space-x-3">
                        <span class="font-semibold">Hi, {{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="bg-amber-600 px-3 py-1 rounded-lg text-white hover:bg-amber-700">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

           <!-- Hero Section -->
                <section class="relative py-20">
           <!-- Background image -->
                  <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/Anicette-welcomepage.jpeg') }}');"></div>
         <!-- Overlay (to make text readable) -->
              <div class="absolute inset-0 bg-yellow-100/70 backdrop-blur-sm"></div>

          <!-- Content -->
                 <div class="relative max-w-4xl mx-auto text-center">
                     <h1 class="text-5xl font-extrabold text-yellow-900">Welcome to Anicette</h1>
                    <p class="mt-4 text-lg text-yellow-800">Cute, elegant, and freshly baked pastries made with love.</p>
                    <a href="#" class="mt-6 inline-block px-6 py-3 bg-yellow-900 text-white rounded-full hover:bg-yellow-700">Shop Now</a>
             </div>
        </section>


            <!-- Main -->
            <main class="max-w-7xl mx-auto px-6 py-12">
                <h2 class="text-3xl font-bold text-center text-amber-800 mb-10">Our Bestsellers</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                    <!-- Card 1 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition">
                        <img src="{{asset('images/Tiramisu-Swiss-Roll-Cake.jpg')}}" class="w-full h-48 object-cover" alt="Cake">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-amber-800">Tiramisu Swiss Roll Cake</h3>
                            <p class="text-gray-600 mt-2">Tiramisu Swiss roll is a soft coffee sponge filled with creamy mascarpone and dusted with cocoa.</p>
                            <button class="mt-4 bg-amber-600 text-white px-4 py-2 rounded-lg hover:bg-amber-700">Add to Cart</button>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition">
                        <img src="{{asset('images/Butter Croissant.jpg')}}" class="w-full h-48 object-cover" alt="Croissant">
                        <div class="p-6">
                            <h4 class="text-xl font-bold text-amber-800">Butter Croissant</h4>
                            <p class="text-gray-600 mt-2">Flaky, golden, and perfectly buttery.</p>
                            <button class="mt-4 bg-amber-600 text-white px-4 py-2 rounded-lg hover:bg-amber-700">Add to Cart</button>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition">
                        <img src="{{asset('images/salted-caramel-macarons.jpg')}}" class="w-full h-48 object-cover" alt="Macarons">
                        <div class="p-6">
                            <h5 class="text-xl font-bold text-amber-800">Salted Caramel Macarons</h5>
                            <p class="text-gray-600 mt-2">Salted caramel macarons are crisp shells with a sweet-salty caramel filling.</p>
                            <button class="mt-4 bg-amber-600 text-white px-4 py-2 rounded-lg hover:bg-amber-700">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-amber-100 text-center py-6 mt-10">
                <p class="text-gray-700">&copy; {{ date('Y') }} Anicette Pastry Shop. All rights reserved.</p>
            </footer>
        </div>
    </div>
</body>
</html>
