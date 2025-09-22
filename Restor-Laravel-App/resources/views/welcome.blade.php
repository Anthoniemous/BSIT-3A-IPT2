<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restoré | Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <nav class="fixed w-full bg-black/80 text-white shadow-lg z-50">
        <div class="container mx-auto flex justify-between items-center px-6 py-4">
            <a href="#" class="text-2xl font-bold tracking-wide text-yellow-400">Restoré</a>
            <ul class="hidden md:flex space-x-8 text-lg items-center">
                <li><a href="#" class="hover:text-yellow-400 transition">Home</a></li>
                <li><a href="#menu" class="hover:text-yellow-400 transition">Menu</a></li>
                <li><a href="#about" class="hover:text-yellow-400 transition">About</a></li>
                <li><a href="#contact" class="hover:text-yellow-400 transition">Contact</a></li>
                <li><a href="/login" class="px-4 py-2 bg-yellow-400 text-black rounded-lg hover:bg-yellow-500 transition">Login</a></li>
                <li><a href="/register" class="px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-600 transition">Register</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero -->
    <section class="h-screen bg-[url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80')] bg-cover bg-center flex items-center justify-center text-center text-white relative">
        <div class="bg-black/50 p-8 rounded-xl max-w-xl mx-auto">
            <h1 class="text-5xl md:text-6xl font-bold mb-4">Welcome to Restoré</h1>
            <p class="text-lg md:text-xl mb-6">Fine dining, fresh flavors, unforgettable experiences</p>
            <a href="#menu" class="block w-full px-6 py-3 mb-4 bg-yellow-400 text-black font-semibold rounded-lg hover:bg-yellow-500 transition">Explore Menu</a>
            
            <!-- Google Button -->
            <a href="/auth/redirect" class="flex items-center justify-center gap-3 w-full px-6 py-3 bg-white text-gray-700 font-semibold rounded-lg shadow hover:bg-gray-100 transition">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google Icon" class="w-6 h-6">
                Continue with Google
            </a>
        </div>  
    </section>

    <!-- Menu Section -->
    <section id="menu" class="py-16 container mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold mb-12">Our Best Sellers</h2>
        <div class="grid md:grid-cols-3 gap-10">
            
            <!-- Pasta -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden hover:scale-105 transition">
                <img src="https://www.shutterstock.com/image-photo/chicken-alfredo-penne-creamy-pasta-600nw-2430169591.jpg" alt="Creamy Alfredo Pasta" class="w-full h-56 object-cover">
                <div class="p-6">
                    <h5 class="text-xl font-semibold mb-2">Creamy Alfredo Pasta</h5>
                    <p class="text-gray-500">₱299</p>
                </div>
            </div>

            <!-- Pizza -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden hover:scale-105 transition">
                <img src="https://www.nonnabox.com/wp-content/uploads/pizza_napolitana.jpg" alt="Classic Italian Pizza" class="w-full h-56 object-cover">
                <div class="p-6">
                    <h5 class="text-xl font-semibold mb-2">Classic Italian Pizza</h5>
                    <p class="text-gray-500">₱399</p>
                </div>
            </div>

            <!-- Steak -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden hover:scale-105 transition">
                <img src="https://nebraskastarbeef.com/wp-content/uploads/2022/09/52913995_m-scaled.jpg" alt="Grilled Beef Steak" class="w-full h-56 object-cover">
                <div class="p-6">
                    <h5 class="text-xl font-semibold mb-2">Grilled Beef Steak</h5>
                    <p class="text-gray-500">₱499</p>
                </div>
            </div>

            <!-- Salad -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden hover:scale-105 transition">
                <img src="https://nutritionrefined.com/wp-content/uploads/2023/08/homemade-garden-salad-featured-500x375.jpg" alt="Fresh Garden Salad" class="w-full h-56 object-cover">
                <div class="p-6">
                    <h5 class="text-xl font-semibold mb-2">Fresh Garden Salad</h5>
                    <p class="text-gray-500">₱199</p>
                </div>
            </div>

            <!-- Sushi -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden hover:scale-105 transition">
                <img src="https://images.stockcake.com/public/a/5/8/a58f1cfe-fe92-4c01-8618-99c0f479a7f0_large/delicious-sushi-platter-stockcake.jpg" alt="Assorted Sushi Platter" class="w-full h-56 object-cover">
                <div class="p-6">
                    <h5 class="text-xl font-semibold mb-2">Assorted Sushi Platter</h5>
                    <p class="text-gray-500">₱599</p>
                </div>
            </div>

            <!-- Dessert -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden hover:scale-105 transition">
                <img src="https://images.getrecipekit.com/20250325120225-how-20to-20make-20chocolate-20molten-20lava-20cake-20in-20the-20microwave.png?width=650&quality=90&" alt="Chocolate Lava Cake" class="w-full h-56 object-cover">
                <div class="p-6">
                    <h5 class="text-xl font-semibold mb-2">Chocolate Lava Cake</h5>
                    <p class="text-gray-500">₱249</p>
                </div>
            </div>

        </div>
    </section>

    <!-- About -->
    <section id="about" class="py-16 bg-gray-100">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-6">About Us</h2>
            <p class="max-w-2xl mx-auto text-lg text-gray-700">
                At Restoré, we bring flavors from around the world to your plate. 
                Our chefs use only the freshest ingredients to create meals that delight your taste buds. 
                Whether it’s a family dinner, a romantic date, or a casual night out, we make every moment memorable.
            </p>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-6">Contact Us</h2>
            <p class="mb-2">📍 123 Main Street, Davao City</p>
            <p class="mb-4">✉️ <a href="mailto:support@restore.com" class="text-yellow-500 hover:underline">support@restore.com</a> | 📞 +63 912 345 6789</p>
            <a href="mailto:support@restore.com" class="px-6 py-3 bg-black text-white rounded-lg hover:bg-gray-800 transition">Send Message</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black text-gray-400 py-6 text-center">
        <p>&copy; {{ date('Y') }} Restoré. All rights reserved.</p>
    </footer>

</body>
</html>
