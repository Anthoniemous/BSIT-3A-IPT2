<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-brown-800 leading-tight">
            {{ __('Coffee Haven') }}
        </h2>
    </x-slot>

    <head><!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    </head>
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-amber-100 to-amber-200 py-20">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 items-center gap-12">
            <!-- Text + CTA -->
            <div>
                <h1 class="text-4xl font-bold text-brown-800 mb-4">Welcome to Coffee Haven</h1>
                <p class="text-lg text-brown-700 mb-6">Where every cup tells a story. Freshly brewed coffee, cozy vibes, and a perfect place to relax.</p>
                <a href="#menu" class="bg-amber-600 text-white px-6 py-3 rounded-lg shadow hover:bg-amber-700 transition">
                    Explore Our Menu
                </a>
            </div>
            <!-- Image -->
            <div>
                <img width="500 "src="{{ asset('images/coffee-hero1.jpg') }}" alt="Coffee cup" class="rounded-5x2 shadow-lg">
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 bg-white">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-brown-800">Our Story</h2>
            <p class="mt-6 text-brown-700 leading-relaxed">
                At Coffee Haven, we believe coffee is more than a drink — it’s an experience. 
                From bean to cup, we serve only the finest blends, paired with homemade pastries in a warm and welcoming space.
            </p>
        </div>
    </section>

    <!-- Menu Section -->
    <section id="menu" class="py-16 bg-amber-50">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-brown-800">Menu Highlights</h2>
            <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <img src="{{ asset('images/latte.jpg') }}" alt="Latte" class="w-full h-40 object-cover rounded-lg shadow rounded-lg mb-4">
                    <h3 class="font-semibold text-lg text-brown-700">Classic Latte</h3>
                    <p class="text-brown-600 mt-2">Smooth espresso blended with steamed milk.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <img src="{{ asset('images/cappuccino.jpg') }}" alt="Cappuccino" class="w-full h-40 object-cover rounded-lg shadow rounded-lg mb-4">
                    <h3 class="font-semibold text-lg text-brown-700">Cappuccino</h3>
                    <p class="text-brown-600 mt-2">Rich espresso topped with frothy milk foam.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <img src="{{ asset('images/croissant.jpg') }}" alt="Croissant" class="rounded-lg mb-4">
                    <h3 class="font-semibold text-lg text-brown-700">Butter Croissant</h3>
                    <p class="text-brown-600 mt-2">Flaky, buttery pastry baked fresh daily.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-brown-800">What Customers Say</h2>
            <div class="mt-10 space-y-8">
                <blockquote class="p-6 bg-amber-50 rounded-xl shadow">
                    <p class="text-brown-700 italic">"Best coffee in town! Cozy atmosphere and friendly staff."</p>
                    <footer class="mt-4 font-semibold text-amber-700">– Maria G.</footer>
                </blockquote>
                <blockquote class="p-6 bg-amber-50 rounded-xl shadow">
                    <p class="text-brown-700 italic">"Their croissants are just divine, perfect with a cappuccino."</p>
                    <footer class="mt-4 font-semibold text-amber-700">– John P.</footer>
                </blockquote>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 bg-amber-100">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-brown-800">Visit Us</h2>
            <p class="mt-6 text-brown-700">123 Coffee Street, Bean City</p>
            <p class="text-brown-700">Open Daily: 8am – 9pm</p>
            <a href="mailto:info@coffeehaven.com" class="mt-6 inline-block bg-brown-700 text-black px-6 py-3 rounded-lg shadow hover:bg-brown-800 transition">
                Contact Us
            </a>
        </div>
    </section>

    <!-- Footer -->
<footer class="bg-[#3e2723] text-white pt-12">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-10">
        <!-- Brand -->
        <div>
            <h3 class="text-xl font-bold mb-4">☕ Coffee Haven</h3>
            <p class="text-gray-300 leading-relaxed">
                Your neighborhood coffee shop serving freshly brewed coffee and homemade pastries daily.
            </p>
        </div>

        <!-- Quick Links -->
        <div>
            <h4 class="font-semibold text-lg mb-4">Quick Links</h4>
            <ul class="space-y-2">
                <li><a href="#about" class="hover:underline">About Us</a></li>
                <li><a href="#menu" class="hover:underline">Menu</a></li>
                <li><a href="#contact" class="hover:underline">Contact</a></li>
                <li><a href="#" class="hover:underline">Careers</a></li>
            </ul>
        </div>

        <!-- Contact Info -->
        <div>
            <h4 class="font-semibold text-lg mb-4">Contact</h4>
            <p class="text-gray-300">123 Coffee Street, Bean City</p>
            <p class="text-gray-300">Open Daily: 8am – 9pm</p>
            <p class="text-gray-300 mt-2">Email: info@coffeehaven.com</p>
            <p class="text-gray-300">Phone: (123) 456-7890</p>
        </div>
    </div>

    <!-- Divider -->
    <div class="border-t border-gray-700 my-8"></div>

    <!-- Social Links -->
    <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center">
        <p class="text-gray-400 text-sm">&copy; {{ date('Y') }} Coffee Haven. All rights reserved.</p>
        <div class="flex gap-6 mt-4 md:mt-0">
    <a href="#" class="hover:text-amber-400 text-2xl"><i class="fab fa-facebook-f"></i></a>
    <a href="#" class="hover:text-amber-400 text-2xl"><i class="fab fa-instagram"></i></a>
    <a href="#" class="hover:text-amber-400 text-2xl"><i class="fab fa-twitter"></i></a>
</div>

    </div>
</footer>


</x-app-layout>
