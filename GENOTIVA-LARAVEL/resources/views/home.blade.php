@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-pink-100 via-pink-50 to-white font-sans relative">

    <!-- TOP NAVBAR -->
<nav class="fixed top-0 w-full z-50 bg-gradient-to-r from-pink-100 via-white to-pink-100 backdrop-blur-md shadow-md">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="text-2xl font-extrabold text-pink-600 hover:text-pink-700 transition transform hover:scale-105">
            ✿ Jessamae's Veloura Café ✿
        </a>

        <!-- Navigation Links -->
        <div class="hidden md:flex space-x-8 text-pink-600 font-medium">
            <a href="#home" class="hover:text-pink-700 transition">Home</a>
            <a href="#menu" class="hover:text-pink-700 transition">Menu</a>
            <a href="#about" class="hover:text-pink-700 transition">About</a>
            <a href="#contact" class="hover:text-pink-700 transition">Contact</a>

            @guest
                <a href="{{ route('login') }}" class="hover:text-pink-700 transition">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="hover:text-pink-700 transition">Register</a>
                @endif
            @else
                <!-- User Dropdown -->
                <div class="relative">
                    <button id="user-menu-button" class="flex items-center hover:text-pink-700 transition">
                        {{ Auth::user()->name }} ⌄
                    </button>
                    <div id="user-dropdown" class="absolute right-0 mt-2 w-44 bg-white/95 rounded-lg shadow-lg hidden">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-pink-100">Profile</a>
                        <a href="{{ route('logout') }}" 
                           class="block px-4 py-2 text-gray-700 hover:bg-pink-100 rounded-b-lg"
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

        // Close dropdown if clicking outside
        document.addEventListener("click", function (e) {
            if (!btn.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add("hidden");
            }
        });
    });
</script>


    <!-- HERO -->
    <section id="home" class="relative w-full flex items-center justify-center min-h-screen overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-pink-200 via-white to-pink-100 -skew-y-6 transform origin-top-left"></div>
        <div class="relative z-10 text-center px-6 py-32">
            <h1 class="text-5xl md:text-6xl font-extrabold text-pink-600 mb-4 animate-pulse">Jessamae's Veloura Café ☕</h1>
            <p class="text-lg md:text-xl text-gray-700 max-w-2xl mx-auto mb-6">
                Every sip blooms with flavor 🌸 Milk teas, boba, and shakes crafted to brighten your day!
            </p>
            <a href="#menu" class="inline-block bg-pink-500 hover:bg-pink-600 text-white font-semibold px-8 py-3 rounded-2xl shadow-lg transform hover:scale-105 transition">Explore Menu 🍹</a>
        </div>
    </section>

    <!-- MENU -->
    <section id="menu" class="py-24 px-6 max-w-7xl mx-auto relative">
        <h2 class="text-3xl font-bold text-center text-pink-600 mb-16">Our Bestsellers ✨</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            @foreach ([
                ['title'=>'Classic Milk Tea','img'=>'milk-tea.jpg','desc'=>'Rich and creamy with chewy pearls.'],
                ['title'=>'Strawberry Shake','img'=>'strawberry-shake.jpg','desc'=>'Sweet, refreshing, and fruity!'],
                ['title'=>'Matcha Latte','img'=>'matcha-latte.jpg','desc'=>'Earthy matcha with creamy milk.']
            ] as $item)
                <div class="relative group bg-white/90 rounded-3xl shadow-2xl overflow-hidden transform hover:-translate-y-3 hover:shadow-3xl transition duration-500">
                    <img src="{{ asset('images/'.$item['img']) }}" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-pink-900/50 to-transparent flex flex-col justify-end p-6 opacity-0 group-hover:opacity-100 transition duration-500">
                        <h3 class="text-xl font-bold text-white">{{ $item['title'] }}</h3>
                        <p class="text-white text-sm mt-1">{{ $item['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- ABOUT -->
    <section id="about" class="py-24 px-6 bg-gradient-to-r from-white via-pink-50 to-purple-50 text-center">
        <h2 class="text-3xl font-bold text-pink-600 mb-6">About Us</h2>
        <p class="max-w-3xl mx-auto text-gray-700 text-lg leading-relaxed">
            At <span class="font-bold text-pink-600">Jessamae's Veloura Café ☕</span>, every sip is a celebration.  
            Fresh pearls, vibrant flavors, and drinks crafted to make your day bloom 🌸.  
            Life’s too short for boring beverages!
        </p>
    </section>

    <!-- CONTACT -->
    <section id="contact" class="py-24 px-6 text-center bg-gradient-to-br from-pink-200 via-white to-purple-100">
        <h2 class="text-3xl font-bold text-pink-600 mb-4">Craving a Sip? 🍹</h2>
        <p class="mb-6 text-lg text-gray-700">Order now and let your day bloom brighter!</p>
        <a href="mailto:orders@bloomboba.com" class="bg-pink-500 hover:bg-pink-600 text-white font-bold px-8 py-3 rounded-2xl shadow-lg transform hover:scale-105 transition">Order via Email 📩</a>
    </section>

</div>
@endsection
