@extends('layouts.app')

@section('content')
<div class="font-sans bg-gradient-to-b from-pink-200 via-yellow-200 to-pink-100">

   <!-- NAVIGATION -->
   <header class="w-full py-6 bg-white shadow-md sticky top-0 z-50">
       <div class="max-w-7xl mx-auto flex justify-between items-center px-6">
           <a href="{{ url('/') }}" class="text-2xl font-extrabold text-pink-600 flex items-center space-x-2">
               <span>💎</span><span>Princess Gems</span>
           </a>
           <nav class="flex space-x-4">
               <a href="#home" class="px-4 py-2 rounded-full hover:bg-pink-100 text-pink-600 font-medium transition">Home</a>
               <a href="#collection" class="px-4 py-2 rounded-full hover:bg-pink-100 text-pink-600 font-medium transition">Collection</a>
               <a href="#story" class="px-4 py-2 rounded-full hover:bg-pink-100 text-pink-600 font-medium transition">Our Story</a>
               <a href="#contact" class="px-4 py-2 rounded-full hover:bg-pink-100 text-pink-600 font-medium transition">Contact</a>

               @guest
                   <a href="{{ route('login') }}" 
                      class="px-4 py-2 rounded-full hover:bg-pink-100 text-pink-600 font-medium transition">Login</a>
                   @if (Route::has('register'))
                       <a href="{{ route('register') }}" 
                          class="px-4 py-2 rounded-full hover:bg-pink-100 text-pink-600 font-medium transition">Register</a>
                   @endif
               @else
                   <div class="relative">
                       <button id="dropdownBtn" 
                               class="px-4 py-2 rounded-full font-medium text-pink-600 hover:bg-pink-100 flex items-center transition">
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
   <section id="home" class="relative">
       <div class="relative w-full h-[85vh] flex items-center justify-center bg-gradient-to-br from-pink-200 via-yellow-200 to-pink-100 overflow-hidden">
           <img src="{{ asset('images/hero-gem.jfif') }}" 
                alt="Gems" 
                class="absolute inset-0 w-full h-full object-cover opacity-20">
           <div class="relative z-10 text-center max-w-3xl px-6">
               <h1 class="text-6xl font-extrabold text-pink-700 drop-shadow mb-6">Princess Gems ✨</h1>
               <p class="text-lg md:text-xl text-pink-800 mb-8">Celebrate your uniqueness with your <span class="font-semibold">birthstone</span>.</p>
               <a href="#collection" class="inline-block bg-gradient-to-r from-yellow-300 to-pink-400 hover:from-pink-400 hover:to-yellow-300 text-pink-900 font-bold px-10 py-4 rounded-full shadow-lg transition">
                   Explore Collection
               </a>
           </div>
       </div>
   </section>

   <!-- COLLECTION -->
   <section id="collection" class="py-20 px-6 bg-white">
       <h2 class="text-3xl font-bold text-pink-600 text-center mb-12">Birthstone Collection</h2>
       <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 max-w-6xl mx-auto">
           @php
               $stones = [
                   ['name'=>'Amethyst','img'=>'amethyst.jpg'],
                   ['name'=>'Emerald','img'=>'emerald.jpg'],
                   ['name'=>'Aquamarine','img'=>'aquamarine.jpg'],
                   ['name'=>'Ruby','img'=>'ruby.jpg'],
                   ['name'=>'Sapphire','img'=>'sapphire.jpg'],
                   ['name'=>'Topaz','img'=>'topaz.webp']
               ];
           @endphp
           @foreach($stones as $stone)
               <div class="group relative rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
                   <img src="{{ asset('images/'.$stone['img']) }}" class="w-full h-64 object-cover">
                   <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition flex items-end p-4">
                       <h3 class="text-white text-xl font-semibold">{{ $stone['name'] }}</h3>
                   </div>
               </div>
           @endforeach
       </div>
   </section>

   <!-- STORY -->
   <section id="story" class="py-20 px-6 bg-gradient-to-r from-yellow-100 to-pink-100">
       <div class="max-w-5xl mx-auto text-center">
           <h2 class="text-3xl font-bold text-pink-600 mb-6">Our Story</h2>
           <p class="text-gray-700 text-lg leading-relaxed mb-8">
               Princess Gems was created to let you carry your birth month with pride.  
               Each gem tells your story, reflecting love, strength, and timeless beauty.  
           </p>
           <p class="text-pink-700 font-semibold italic">“Your gem, your story.”</p>
       </div>
   </section>

   <!-- CONTACT -->
   <section id="contact" class="py-20 px-6 bg-gradient-to-br from-pink-200 via-yellow-200 to-pink-100 text-pink-900">
       <div class="max-w-4xl mx-auto">
           <h2 class="text-3xl font-bold mb-6 text-center">Contact Us</h2>
           <p class="mb-10 text-center text-lg">Looking for your birthstone or a custom design?  
               Send us a message and let’s create something magical together!</p>
           
           <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
               <input type="text" placeholder="Your Name" class="px-4 py-3 rounded-lg border border-pink-300 focus:border-yellow-400 focus:ring focus:ring-yellow-200">
               <input type="email" placeholder="Your Email" class="px-4 py-3 rounded-lg border border-pink-300 focus:border-yellow-400 focus:ring focus:ring-yellow-200 md:col-span-1">
               <textarea placeholder="Your Message" rows="5" class="px-4 py-3 rounded-lg border border-pink-300 focus:border-yellow-400 focus:ring focus:ring-yellow-200 md:col-span-2"></textarea>
               <button type="submit" class="bg-gradient-to-r from-yellow-300 to-pink-400 hover:from-pink-400 hover:to-yellow-300 text-pink-900 font-bold px-6 py-3 rounded-full shadow md:col-span-2 transition">Send Message 💌</button>
           </form>
       </div>
   </section>

   <!-- FOOTER -->
   <footer class="py-6 bg-white text-center text-gray-500">
       &copy; {{ date('Y') }} Princess Gems ✨. Sparkle Always.
   </footer>

</div>
@endsection
