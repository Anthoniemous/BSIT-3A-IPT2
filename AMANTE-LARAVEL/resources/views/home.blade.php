@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-yellow-50 via-white to-orange-50 font-sans">

    <!-- TOP NAVIGATION -->
    <header class="w-full py-6 bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-6xl mx-auto flex justify-between items-center px-6">
            <a href="{{ url('/') }}" class="text-2xl font-extrabold text-red-600 flex items-center space-x-2">
                <span>🍕</span><span>Amante Pizza</span>
            </a>
            <nav class="flex space-x-4">
                <a href="#home" class="px-4 py-2 rounded-full hover:bg-red-100 text-red-600 font-medium transition">Home</a>
                <a href="#menu" class="px-4 py-2 rounded-full hover:bg-red-100 text-red-600 font-medium transition">Menu</a>
                <a href="#about" class="px-4 py-2 rounded-full hover:bg-red-100 text-red-600 font-medium transition">About</a>
                <a href="#contact" class="px-4 py-2 rounded-full hover:bg-red-100 text-red-600 font-medium transition">Contact</a>
                @guest
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded-full hover:bg-red-100 text-red-600 font-medium transition">Login</a>
                    @if(Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 rounded-full hover:bg-red-100 text-red-600 font-medium transition">Register</a>
                    @endif
                @else
                    <div class="relative">
                        <button id="dropdownBtn" class="px-4 py-2 rounded-full font-medium text-red-600 hover:bg-red-100 flex items-center transition">
                            {{ Auth::user()->name }} ▼
                        </button>
                        <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-44 bg-white shadow-md rounded">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                            <a href="{{ route('logout') }}"
                                class="block px-4 py-2 hover:bg-gray-100 rounded-b"
                                onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">Logout</a>
                            <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                        </div>
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            const btn = document.getElementById("dropdownBtn");
                            const menu = document.getElementById("dropdownMenu");
                            btn.addEventListener("click", () => menu.classList.toggle("hidden"));
                        });
                    </script>
                @endguest
            </nav>
        </div>
    </header>

    <!-- HERO -->
    <section id="home" class="flex items-center justify-center text-center py-32 px-6 bg-gradient-to-r from-yellow-100 to-orange-100">
        <div class="bg-white rounded-3xl shadow-xl p-12 max-w-2xl">
            <h1 class="text-5xl font-bold text-red-600 mb-6">Savor Every Slice 🍕</h1>
            <p class="text-gray-700 mb-8">Handcrafted pizzas with fresh ingredients and love in every bite. Start your delicious journey now.</p>
            <a href="#menu" class="bg-red-600 text-white font-bold px-8 py-3 rounded-full hover:bg-red-700 transition">Explore Menu</a>
        </div>
    </section>

    <!-- MENU -->
    <section id="menu" class="py-20 px-6 bg-white">
        <h2 class="text-3xl font-bold text-red-600 text-center mb-12">Our Favorites</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @php
                $pizzas = [
                    ['name'=>'Pepperoni Feast','img'=>'pepperoni.jpg','desc'=>'Extra cheesy and spicy pepperoni slices on a golden crust.'],
                    ['name'=>'Margherita Delight','img'=>'margherita.jpg','desc'=>'Classic simplicity with basil, tomato, and mozzarella.'],
                    ['name'=>'Hawaiian Dream','img'=>'hawaiian.jpg','desc'=>'A tropical blend of sweet pineapple and savory ham.']
                ];
            @endphp
            @foreach($pizzas as $pizza)
                <div class="rounded-3xl p-6 bg-gradient-to-tr from-yellow-50 to-orange-50 shadow-md hover:shadow-lg transition transform hover:-translate-y-2 flex flex-col">
                    <img src="{{ asset('images/'.$pizza['img']) }}" class="h-48 w-full object-cover rounded-xl mb-4">
                    <h3 class="text-xl font-semibold mb-2">{{ $pizza['name'] }}</h3>
                    <p class="text-gray-600 flex-grow">{{ $pizza['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- ABOUT -->
    <section id="about" class="py-20 px-6 bg-orange-50 text-center">
        <h2 class="text-3xl font-bold text-red-600 mb-6">Our Story</h2>
        <p class="text-gray-700 max-w-3xl mx-auto leading-relaxed">
            At <span class="font-bold">Amante Pizza</span>, pizza is not just food — it’s a celebration of flavor, tradition, and togetherness. 
            From our first oven to today, we bring people closer with every slice.
        </p>
    </section>

    <!-- CONTACT -->
    <section id="contact" class="py-20 px-6 bg-red-600 text-center text-white">
        <h2 class="text-3xl font-bold mb-4">Order Today!</h2>
        <p class="mb-6">Experience the magic of freshly baked pizza 🍕</p>
        <a href="mailto:orders@amantepizza.com" class="bg-white text-red-600 px-8 py-3 rounded-full font-bold shadow hover:bg-gray-100 transition">
            Send Email 📩
        </a>
    </section>

</div>
@endsection
