<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="relative min-h-screen">
        <!-- Background with candies -->
        <div class="absolute inset-0">
            <img src="{{ asset('images/candies.jpg') }}" alt="Candies Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-pink-200/60"></div>
        </div>

        <!-- Navigation -->
        <nav class="relative z-10 flex items-center justify-between px-8 py-4 bg-violet-200/90 shadow-md">
            <div class="text-2xl font-bold text-gray-800">
                🍭 {{ config('app.name', 'Laravel') }}
            </div>
            <ul class="flex space-x-4 font-semibold">
    <li>
        <a href="{{ url('/') }}"
           class="px-4 py-2 rounded-full bg-pink-200 text-gray-800 hover:bg-pink-300 shadow-md transition">
            Home
        </a>
    </li>
    <li>
        <a href="{{ url('/about') }}"
           class="px-4 py-2 rounded-full bg-violet-200 text-gray-800 hover:bg-violet-300 shadow-md transition">
            About Us
        </a>
    </li>
    <li>
        <a href="{{ url('/help') }}"
           class="px-4 py-2 rounded-full bg-yellow-200 text-gray-800 hover:bg-yellow-300 shadow-md transition">
            Help
        </a>
    </li>
</ul>

            <div class="flex items-center space-x-4">
                <!-- Search -->
                <form action="{{ url('/search') }}" method="GET" class="flex">
                    <input type="text" name="query" placeholder="Search..."
                           class="px-3 py-1 rounded-l-md border border-gray-300 focus:outline-none text-gray-800">
                    <button type="submit"
                            class="bg-yellow-200 px-4 py-1 rounded-r-md font-semibold hover:bg-yellow-300 text-gray-800">
                        Go
                    </button>
                </form>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="ml-4 bg-pink-300 px-4 py-1 rounded-md font-semibold text-gray-800 hover:bg-pink-400">
                        Logout
                    </button>
                </form>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="relative z-10 flex items-center justify-center h-[75vh] text-center">
            <div class="bg-white/70 p-10 rounded-xl shadow-xl max-w-xl">
                <h1 class="text-5xl font-bold mb-4 text-violet-700">Welcome, {{ Auth::user()->name }}!</h1>
                <p class="text-lg text-gray-800 mb-6">
                    You’re logged in 🎉 Enjoy exploring with sweet pastel vibes.
                </p>
                <img src="{{ asset('images/candy-bowl.png') }}" alt="Candy Bowl"
                     class="w-48 mx-auto rounded-lg shadow-md border-4 border-yellow-200">
            </div>
        </div>
    </div>
</x-app-layout>
