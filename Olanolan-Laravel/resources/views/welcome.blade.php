<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trekcave</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-900">

    <!-- Navbar -->
    <header class="flex justify-between items-center px-10 py-6 bg-white shadow-sm">
        <!-- Logo -->
        <div class="text-2xl font-bold">
            <span class="text-orange-500">Trek</span>cave
        </div>

        <!-- Nav Links -->
        <nav class="hidden md:flex space-x-8 text-gray-700 font-medium">
            <a href="#" class="hover:text-orange-500">Bookings</a>
            <a href="#" class="hover:text-orange-500">Trekking Map</a>
            <a href="#" class="hover:text-orange-500">Packages</a>
            <a href="#" class="hover:text-orange-500">Instructor</a>
            <a href="#" class="hover:text-orange-500">Contact</a>
        </nav>

        <!-- Auth Links -->
        <div class="flex items-center space-x-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}" class="text-gray-700 hover:text-orange-500 font-medium">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-orange-500 font-medium">
                        Login
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-orange-500 text-white px-6 py-2 rounded-lg shadow hover:bg-orange-600 transition">
                            Register
                        </a>
                    @endif
                @endauth
            @endif

        </div>
    </header>

    <!-- Hero Section -->
    <section class="px-10 py-16 grid md:grid-cols-2 gap-10 items-center">
        <div>
            <h1 class="text-5xl font-extrabold leading-tight">
                Trekking & <br> Cumping
            </h1>
            <p class="mt-4 text-lg text-gray-600">
                A perfect guide to your snow peak adventures
            </p>
            <a href="#"
               class="mt-6 inline-block bg-orange-500 text-white px-8 py-3 rounded-lg shadow hover:bg-orange-600 transition">
                BOOK NOW
            </a>
        </div>

        <!-- Hero Image -->
        <div class="relative">
            <img src="{{ asset('images/bg.jpg') }}" alt="Mountain" class="rounded-2xl shadow-lg w-full">
            <!-- Floating Badge -->
            <div class="absolute top-5 right-5 bg-white/80 backdrop-blur px-4 py-2 rounded-lg shadow">
                <p class="font-semibold text-sm">Trekking KM</p>
                <p class="text-xs text-gray-600">79.4 km</p>
            </div>
            <!-- Profile + Count -->
            <div class="absolute bottom-5 left-5 bg-white/90 backdrop-blur px-4 py-2 rounded-lg shadow flex items-center space-x-2">
                <div class="flex -space-x-2">
                    <img class="w-8 h-8 rounded-full border-2 border-white" src="https://i.pravatar.cc/40?img=1">
                    <img class="w-8 h-8 rounded-full border-2 border-white" src="https://i.pravatar.cc/40?img=2">
                    <img class="w-8 h-8 rounded-full border-2 border-white" src="https://i.pravatar.cc/40?img=3">
                </div>
                <span class="text-sm font-medium text-gray-700">100k+</span>
            </div>
        </div>
    </section>

    <!-- Packages Section -->
    <section class="px-10 py-10">
        <div class="flex justify-center space-x-6 overflow-x-auto scrollbar-hide">
            <!-- Card -->
            <div class="min-w-[250px] bg-white rounded-xl shadow p-4">
                <img src="https://picsum.photos/400/200?random=1" class="rounded-lg">
                <h3 class="mt-3 font-bold">Manali Trek</h3>
                <p class="text-sm text-gray-500">7 Days / Night</p>
                <p class="text-orange-500 text-sm mt-1">⭐ 5.0 (120 Reviews)</p>
            </div>
            <div class="min-w-[250px] bg-white rounded-xl shadow p-4">
                <img src="https://picsum.photos/400/200?random=2" class="rounded-lg">
                <h3 class="mt-3 font-bold">Sikkim, India</h3>
                <p class="text-sm text-gray-500">7 Days / Night</p>
                <p class="text-orange-500 text-sm mt-1">⭐ 4.9 (98 Reviews)</p>
            </div>
            <div class="min-w-[250px] bg-white rounded-xl shadow p-4">
                <img src="https://picsum.photos/400/200?random=3" class="rounded-lg">
                <h3 class="mt-3 font-bold">Kashmir Valley</h3>
                <p class="text-sm text-gray-500">7 Days / Night</p>
                <p class="text-orange-500 text-sm mt-1">⭐ 5.0 (143 Reviews)</p>
            </div>
        </div>
    </section>

</body>
</html>
