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

                        <!-- ABOUT -->
    <section id="about" class="bg-gradient-to-r from-yellow-50 via-amber-50 to-yellow-100 py-16">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center px-6">
            <img src="{{ asset('images/about.png') }}" alt="About Anicette Pastry Shop" class="rounded-2xl shadow-lg">
            <div>
                <h2 class="text-3xl font-bold text-amber-800">About Anicette Pastry Shop</h2>
                <p class="mt-4 text-amber-700 leading-relaxed">
                    At <span class="font-semibold text-amber-900">Anicette Pastry Shop</span>, we believe every pastry tells a story. 
                    From buttery croissants to delicate macarons and creamy cakes, our treats are crafted with passion and love. 
                    Each bite is meant to bring warmth, sweetness, and joy to your day. 🍰
                </p>
                <p class="mt-4 text-amber-700 leading-relaxed">
                    What started as a small dream has grown into a haven for pastry lovers who appreciate 
                    both elegance and flavor. Whether you’re celebrating a special occasion or simply craving something sweet, 
                    Anicette is here to make your moments unforgettable. 💖
                </p>
                <a href="#menu" class="inline-block mt-6 px-6 py-3 bg-amber-700 text-white rounded-full shadow-md hover:bg-amber-800 transition">
                    Explore Our Menu
                </a>
            </div>
        </div>
    </section>

    <!-- FEATURED CATEGORIES -->
    <section class="bg-yellow-50 py-16">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-amber-800">Featured Categories</h2>
            <div class="mt-10 grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="bg-amber-100 p-6 rounded-xl shadow hover:scale-105 transition text-center">
                    <h3 class="text-lg font-semibold text-amber-800">Cakes</h3>
                </div>
                <div class="bg-amber-100 p-6 rounded-xl shadow hover:scale-105 transition text-center">
                    <h3 class="text-lg font-semibold text-amber-800">Pastries</h3>
                </div>
                <div class="bg-amber-100 p-6 rounded-xl shadow hover:scale-105 transition text-center">
                    <h3 class="text-lg font-semibold text-amber-800">Breads</h3>
                </div>
                <div class="bg-amber-100 p-6 rounded-xl shadow hover:scale-105 transition text-center">
                    <h3 class="text-lg font-semibold text-amber-800">Drinks</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="bg-gradient-to-r from-amber-50 via-yellow-50 to-amber-50 py-16">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-amber-800">What Our Customers Say</h2>
            <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-yellow-100 p-6 rounded-xl shadow">
                    <p class="text-amber-800">“The best pastries in town! Their croissants are heaven.”</p>
                    <h4 class="mt-4 font-semibold text-amber-900">– Maria S.</h4>
                </div>
                <div class="bg-yellow-100 p-6 rounded-xl shadow">
                    <p class="text-amber-800">“I love the aesthetic and taste, perfect for gifts!”</p>
                    <h4 class="mt-4 font-semibold text-amber-900">– John D.</h4>
                </div>
                <div class="bg-yellow-100 p-6 rounded-xl shadow">
                    <p class="text-amber-800">“Their graham bars are my all-time favorite!”</p>
                    <h4 class="mt-4 font-semibold text-amber-900">– Anna L.</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- SPECIAL OFFER -->
    <section class="bg-amber-100 py-16">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-amber-900">Special Offer</h2>
            <p class="mt-4 text-amber-800">Buy 2 cakes, get 1 pastry free! Limited time only.</p>
            <a href="#menu" class="mt-6 inline-block px-8 py-3 bg-amber-700 text-white rounded-full shadow-md hover:bg-amber-800 transition">
                Grab the Deal
            </a>
        </div>
    </section>

    <!-- NEWSLETTER -->
    <section class="bg-gradient-to-r from-yellow-50 via-amber-50 to-yellow-100 py-16">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-amber-800">Join Our Newsletter</h2>
            <p class="mt-2 text-amber-700">Stay updated with our latest pastries, promos, and offers.</p>
            <form class="mt-6 flex flex-col sm:flex-row justify-center">
                <input type="email" placeholder="Enter your email" class="px-4 py-3 rounded-l-lg border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-600 flex-1">
                <button type="submit" class="mt-3 sm:mt-0 sm:ml-2 px-6 py-3 bg-amber-700 text-white rounded-lg shadow hover:bg-amber-800 transition">
                    Subscribe
                </button>
            </form>
        </div>
    </section>

   <!-- CONTACT -->
<section id="contact" class="bg-yellow-50 py-16">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-amber-800 text-center mb-12">Contact Us</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <!-- Left Side: Contact Info -->
            <div class="space-y-6">
                <div>
                    <h3 class="text-xl font-semibold text-amber-900">📍 Visit Our Shop</h3>
                    <p class="mt-2 text-amber-700">E. Aguinaldo St, Lupon, Davao Oriental</p>
                </div>

                <div>
                    <h3 class="text-xl font-semibold text-amber-900">🕒 Opening Hours</h3>
                    <p class="mt-2 text-amber-700">Mon - Sat: 9:00 AM – 8:00 PM</p>
                    <p class="text-amber-700">Sun: Closed</p>
                </div>

                <div>
                    <h3 class="text-xl font-semibold text-amber-900">📞 Contact</h3>
                    <p class="mt-2 text-amber-700">Phone: +63 912 345 6789</p>
                    <p class="text-amber-700">Email: hello@anicettepastry.com</p>
                </div>
            </div>

            <!-- Right Side: Map -->
            <div class="rounded-2xl overflow-hidden shadow-lg">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3262.524859978133!2d126.03488287557447!3d6.933487718586334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32fbd35dacdd777d%3A0xc580bed05e00c8da!2sE%20Aguinaldo%20St%2C%20Lupon%2C%20Davao%20Oriental!5e0!3m2!1sen!2sph!4v1727000000000!5m2!1sen!2sph" 
                    width="100%" 
                    height="400" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</section>

            <!-- Footer -->
            <footer class="bg-amber-100 text-center py-6 mt-10">
                <p class="text-gray-700">&copy; {{ date('Y') }} Anicette Pastry Shop. All rights reserved.</p>
            </footer>

        </div>
    </div>
</body>
</html>
