<x-app-layout>
    <div class="bg-pink-50">
        <!-- Hero Section -->
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 items-center gap-12">
                <!-- Left column -->
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold text-pink-600 leading-tight">
                        Delicious Cakes, Baked with Love 🎂
                    </h1>
                    <p class="mt-4 text-gray-700 text-lg">
                        Order your favorite cakes online and get them delivered fresh to your doorstep.
                    </p>
                    <a href="#order" 
                       class="mt-6 inline-block px-6 py-3 bg-pink-600 text-white font-semibold rounded-xl shadow-lg hover:bg-pink-700 transition">
                        Order Now
                    </a>
                </div>
                <!-- Right column -->
                <div>
                    <img src="{{asset('/images/cake-hero.png')}}"
                         alt="Cake shop" 
                         class="rounded-2xl shadow-lg">
                </div>
            </div>
        </section>

        <!-- Cakes Section -->
        <section id="menu" class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-6">
                <h2 class="text-3xl font-bold text-pink-600 text-center">Our Cakes</h2>
                <p class="mt-2 text-gray-600 text-center">Choose from our best-selling cakes</p>

                <!-- Scrollable Cakes List -->
                <div class="mt-10 flex gap-6 overflow-x-auto pb-6 snap-x snap-mandatory scrollbar-hide">
                    <!-- Cake Item -->
                    <div class="min-w-[250px] bg-pink-100 rounded-xl shadow p-4 snap-start flex-shrink-0">
                        <img width="50" src="{{asset('/images/choco.jpeg')}}" 
                             alt="Chocolate Cake" 
                             class="w-full h-40 object-cover rounded-lg shadow">
                        <h3 class="mt-4 text-xl font-semibold text-gray-800">Chocolate Cake</h3>
                        <p class="text-pink-600 font-bold mt-2">₱899.00</p>
                    </div>

                    <div class="min-w-[250px] bg-pink-100 rounded-xl shadow p-4 snap-start flex-shrink-0">
                        <img width="50" src="{{asset('/images/strawberry.jpg')}}" 
                             alt="Strawberry Cake" 
                             class="w-full h-40 object-cover rounded-lg shadow">
                        <h3 class="mt-4 text-xl font-semibold text-gray-800">Strawberry Delight</h3>
                        <p class="text-pink-600 font-bold mt-2">₱799.00</p>
                    </div>

                    <div class="min-w-[250px] bg-pink-100 rounded-xl shadow p-4 snap-start flex-shrink-0">
                        <img width="50" src="{{asset('/images/redvelvet.jpg')}}" 
                             alt="Red Velvet Cake" 
                             class="w-full h-40 object-cover rounded-lg shadow">
                        <h3 class="mt-4 text-xl font-semibold text-gray-800">Red Velvet</h3>
                        <p class="text-pink-600 font-bold mt-2">₱699.00</p>
                    </div>

                    <div class="min-w-[250px] bg-pink-100 rounded-xl shadow p-4 snap-start flex-shrink-0">
                        <img width="50" src="{{asset('/images/wedding.jpg')}}" 
                             alt="Wedding Cake" 
                             class="w-full h-40 object-cover rounded-lg shadow">
                        <h3 class="mt-4 text-xl font-semibold text-gray-800">Wedding Special</h3>
                        <p class="text-pink-600 font-bold mt-2">₱1899.00</p>
                    </div>

                    <div class="min-w-[250px] bg-pink-100 rounded-xl shadow p-4 snap-start flex-shrink-0">
                        <img width="50" src="{{asset('/images/cupcake.jpg')}}"
                             alt="Cupcake Box" 
                             class="w-full h-40 object-cover rounded-lg shadow">
                        <h3 class="mt-4 text-xl font-semibold text-gray-800">Cupcake Box (6 pcs)</h3>
                        <p class="text-pink-600 font-bold mt-2">₱599.00</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-16 bg-white">
            <div class="max-w-6xl mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold text-pink-600">Why Choose Us?</h2>
                <div class="mt-12 grid gap-8 sm:grid-cols-2 md:grid-cols-4">
                    <div class="p-6 bg-pink-100 rounded-xl shadow hover:shadow-lg transition">
                        <h3 class="font-semibold text-xl text-gray-800">Freshly Baked</h3>
                        <p class="mt-2 text-gray-600">Our cakes are baked fresh daily with premium ingredients.</p>
                    </div>
                    <div class="p-6 bg-pink-100 rounded-xl shadow hover:shadow-lg transition">
                        <h3 class="font-semibold text-xl text-gray-800">Custom Designs</h3>
                        <p class="mt-2 text-gray-600">We create custom cakes for birthdays, weddings, and events.</p>
                    </div>
                    <div class="p-6 bg-pink-100 rounded-xl shadow hover:shadow-lg transition">
                        <h3 class="font-semibold text-xl text-gray-800">Fast Delivery</h3>
                        <p class="mt-2 text-gray-600">Get your cakes delivered fresh and on time, always.</p>
                    </div>
                    <div class="p-6 bg-pink-100 rounded-xl shadow hover:shadow-lg transition">
                        <h3 class="font-semibold text-xl text-gray-800">Affordable Prices</h3>
                        <p class="mt-2 text-gray-600">Enjoy premium cakes at prices that don’t break the bank.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="py-16 bg-pink-50">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-pink-600">What Our Customers Say</h2>

        <!-- Scrollable Container -->
        <div class="mt-10 flex gap-6 overflow-x-auto snap-x snap-mandatory scrollbar-hide pb-4">
            
            <!-- Testimonial Card -->
            <blockquote class="min-w-[300px] max-w-sm p-6 bg-white rounded-xl shadow snap-center flex-shrink-0">
                <p class="text-gray-700 italic">"Best cakes in town! Always fresh and beautifully decorated."</p>
                <footer class="mt-4 font-semibold text-pink-600">– Sarah L.</footer>
            </blockquote>

            <blockquote class="min-w-[300px] max-w-sm p-6 bg-white rounded-xl shadow snap-center flex-shrink-0">
                <p class="text-gray-700 italic">"Their custom birthday cakes are a showstopper. Highly recommend!"</p>
                <footer class="mt-4 font-semibold text-pink-600">– James K.</footer>
            </blockquote>

            <blockquote class="min-w-[300px] max-w-sm p-6 bg-white rounded-xl shadow snap-center flex-shrink-0">
                <p class="text-gray-700 italic">"The delivery was super fast and the cake tasted heavenly. 10/10!"</p>
                <footer class="mt-4 font-semibold text-pink-600">– Maria R.</footer>
            </blockquote>

            <blockquote class="min-w-[300px] max-w-sm p-6 bg-white rounded-xl shadow snap-center flex-shrink-0">
                <p class="text-gray-700 italic">"Our wedding cake was stunning! Everyone loved it and it made our day special."</p>
                <footer class="mt-4 font-semibold text-pink-600">– Daniel & Chloe</footer>
            </blockquote>

            <blockquote class="min-w-[300px] max-w-sm p-6 bg-white rounded-xl shadow snap-center flex-shrink-0">
                <p class="text-gray-700 italic">"Affordable, beautiful, and absolutely delicious. Will order again soon."</p>
                <footer class="mt-4 font-semibold text-pink-600">– Priya S.</footer>
            </blockquote>

        </div>
    </div>
</section>


        <!-- Footer -->
        <footer class="bg-pink-600 text-white pt-12 mt-16">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12">
        
        <!-- Brand -->
        <div>
            <h2 class="text-2xl font-bold mb-4">🍰 Sweet Delights</h2>
            <p class="text-sm leading-relaxed">
                Bringing you freshly baked cakes, pastries, and desserts made with love and premium ingredients.
            </p>
        </div>

        <!-- Quick Links -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:underline">Home</a></li>
                <li><a href="#menu" class="hover:underline">Menu</a></li>
                <li><a href="#" class="hover:underline">Shop</a></li>
                <li><a href="#" class="hover:underline">Orders</a></li>
                <li><a href="#contact" class="hover:underline">Contact</a></li>
            </ul>
        </div>

        <!-- Location & Hours -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Visit Us</h3>
            <p class="text-sm">123 Cake Street, Dessert City</p>
            <p class="text-sm mt-2">📞 (123) 456-7890</p>
            <p class="text-sm mt-4 font-semibold">Opening Hours:</p>
            <p class="text-sm">Mon - Sat: 9:00 AM - 8:00 PM</p>
            <p class="text-sm">Sunday: Closed</p>
        </div>

        <!-- Newsletter -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Newsletter</h3>
            <p class="text-sm mb-4">Sign up to receive special offers, updates, and cake news!</p>
            <form class="flex">
                <input type="email" placeholder="Your email" class="px-3 py-2 rounded-l-md w-full text-gray-800 focus:outline-none">
                <button type="submit" class="bg-white text-pink-600 font-semibold px-4 rounded-r-md hover:bg-pink-100 transition">
                    Subscribe
                </button>
            </form>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-pink-400 mt-12 py-6">
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center">
            <p class="text-sm">© {{ date('Y') }} Sweet Delights Cake Shop. All rights reserved.</p>
            
            <!-- Social Icons -->
            <div class="flex gap-4 mt-4 md:mt-0">
                <a href="#" class="hover:opacity-80">
                    <img width="28px" src="{{asset('/icons/facebook.png')}}" alt="Facebook">
                </a>
                <a href="#" class="hover:opacity-80">
                    <img width="28px" src="{{asset('/icons/instagram.png')}}" alt="Instagram">
                </a>
                <a href="#" class="hover:opacity-80">
                    <img width="28px" src="{{asset('/icons/twitter.png')}}" alt="Twitter">
                </a>
            </div>
        </div>
    </div>
</footer>

    </div>
</x-app-layout>
