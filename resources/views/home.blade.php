<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PRIESLYN FOOD HUB</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">

<div class="min-h-screen bg-gradient-to-b from-green-100 via-white to-green-50 font-sans relative">

    <!-- TOP NAVBAR -->
    <nav class="fixed top-0 w-full z-50 bg-gradient-to-r from-green-100 via-white to-green-100 backdrop-blur-md shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="text-2xl font-extrabold text-green-700 hover:text-green-800 transition transform hover:scale-105">
                🥗 PRIESLYN FOOD HUB
            </a>

            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-8 text-green-700 font-medium">
                <a href="#home" class="hover:text-green-800 transition">Home</a>
                <a href="#menu" class="hover:text-green-800 transition">Menu</a>
                <a href="#about" class="hover:text-green-800 transition">About</a>
                <a href="#contact" class="hover:text-green-800 transition">Contact</a>

                @guest
                    <a href="{{ route('login') }}" class="hover:text-green-800 transition">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="hover:text-green-800 transition">Register</a>
                    @endif
                @else
                    <!-- User Dropdown -->
                    <div class="relative">
                        <button id="user-menu-button" class="flex items-center hover:text-green-800 transition">
                            {{ Auth::user()?->name ?? 'User' }} ⌄
                        </button>
                        <div id="user-dropdown" class="absolute right-0 mt-2 w-44 bg-white/95 rounded-lg shadow-lg hidden">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-100">Profile</a>
                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-100 rounded-b-lg"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </nav>

    <!-- JS for Dropdown -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const btn = document.getElementById("user-menu-button");
            const dropdown = document.getElementById("user-dropdown");

            if (btn) {
                btn.addEventListener("click", () => {
                    dropdown.classList.toggle("hidden");
                });
            }

            document.addEventListener("click", function (e) {
                if (btn && !btn.contains(e.target) && dropdown && !dropdown.contains(e.target)) {
                    dropdown.classList.add("hidden");
                }
            });
        });
    </script>

    <!-- HERO SECTION -->
    <section id="home" class="relative w-full flex items-center justify-center min-h-screen bg-cover bg-center"
             style="background-image: url('{{ asset('images/hero-food.jpg') }}');">
        <div class="bg-black/40 absolute inset-0"></div>
        <div class="relative z-10 text-center px-6 py-32 text-white">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-4">Fresh • Organic • Healthy</h1>
            <p class="text-lg md:text-xl max-w-2xl mx-auto mb-6">
                Serving goodness in every bite 🍴 Taste the love in every dish!
            </p>
            <a href="#menu" class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-8 py-3 rounded-2xl shadow-lg transform hover:scale-105 transition">Explore Menu 🍽️</a>
        </div>
    </section>

    <!-- MENU SECTION -->
    <section id="menu" class="py-24 px-6 max-w-7xl mx-auto relative">
        <h2 class="text-3xl font-bold text-center text-green-700 mb-16">Our Bestsellers ✨</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            @foreach ([ 
                ['title'=>'Grilled Chicken Salad','img'=>'salad.jpg','desc'=>'Healthy, fresh, and full of flavor.'],
                ['title'=>'Fresh Fruit Shake','img'=>'fruit-shake.jpg','desc'=>'Cool and refreshing, made from organic fruits.'],
                ['title'=>'Veggie Wrap','img'=>'veggie-wrap.jpg','desc'=>'Packed with nutrients and delicious taste.']
            ] as $item)
                <div class="relative group bg-white/90 rounded-3xl shadow-2xl overflow-hidden transform hover:-translate-y-3 hover:shadow-3xl transition duration-500">
                    <img src="{{ asset('images/'.$item['img']) }}" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-green-900/50 to-transparent flex flex-col justify-end p-6 opacity-0 group-hover:opacity-100 transition duration-500">
                        <h3 class="text-xl font-bold text-white">{{ $item['title'] }}</h3>
                        <p class="text-white text-sm mt-1">{{ $item['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section id="about" class="py-24 px-6 bg-gradient-to-r from-white via-green-50 to-green-100 text-center">
        <h2 class="text-3xl font-bold text-green-700 mb-6">About Us</h2>
        <p class="max-w-3xl mx-auto text-gray-700 text-lg leading-relaxed">
            At <span class="font-bold text-green-700">PRIESLYN FOOD HUB 🥗</span>, we believe food should be fresh, organic, and healthy.  
            Our meals are carefully crafted to nourish your body and delight your taste buds.  
            Because you deserve nothing less than nature’s best! 🌿
        </p>
    </section>

    <!-- CONTACT SECTION -->
    <section id="contact" class="py-24 px-6 text-center bg-gradient-to-br from-green-200 via-white to-green-100">
        <h2 class="text-3xl font-bold text-green-700 mb-4">Hungry? Order Now 🍴</h2>
        <p class="mb-6 text-lg text-gray-700">Get your healthy favorites delivered to your doorstep 🚚</p>
        <a href="mailto:orders@prieslynfoodhub.com" class="bg-green-600 hover:bg-green-700 text-white font-bold px-8 py-3 rounded-2xl shadow-lg transform hover:scale-105 transition">Order via Email 📩</a>
    </section>

</div>
</body>
</html>
