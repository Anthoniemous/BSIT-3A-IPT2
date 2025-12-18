<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Archiora - Modern Shopping</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<header class="bg-orange-700/90 backdrop-blur-md shadow-md sticky top-0 z-50 font-poppins">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        
        <!-- Logo -->
        <a href="/dashboard" class="flex items-center space-x-2">
            <img src="{{ asset('images/logo.png') }}" alt="App Logo" class="h-10 w-10">
            <span class="text-2xl font-bold text-white drop-shadow">Archiora Pets</span>
        </a>

        <!-- Search -->
        <div class="hidden md:block flex-1 mx-6">
            <input type="text" placeholder="Search pet toys, treats, or accessories..."
                class="w-full px-4 py-2 rounded-full bg-orange-100/80 border border-orange-300 text-gray-800 focus:ring-2 focus:ring-orange-400 focus:outline-none placeholder-gray-500">
        </div>

        <!-- Navigation -->
        <nav class="flex items-center space-x-5">
            <a href="/dashboard" class="text-orange-100 hover:text-white transition">Home</a>
            <a href="#categories" class="text-orange-100 hover:text-white transition">Categories</a>
            <a href="#products" class="text-orange-100 hover:text-white transition">Shop</a>
            <a href="#contact" class="text-orange-100 hover:text-white transition">Contact</a>

            <!-- ...existing navbar code... -->
<nav class="flex items-center gap-4">
  <a href="{{ route('user.cart') }}" class="relative text-orange-600 hover:text-orange-700">
    🛒 Cart
    <span id="cartCount" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">0</span>
  </a>
  <a href="{{ route('user.wishlist') }}" class="text-pink-600 hover:text-pink-700">💖 Wishlist</a>
</nav>

<script>
  function updateCartCount() {
    try {
      const cart = JSON.parse(localStorage.getItem('cart') || '[]');
      document.getElementById('cartCount').textContent = cart.length;
    } catch (e) {}
  }
  updateCartCount();
  window.addEventListener('storage', updateCartCount);
</script>

            {{-- ✅ Authenticated User Dropdown (Unchanged as requested) --}}
            <div class="hidden sm:flex sm:items-center sm:ms-6">
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button
                class="inline-flex items-center px-4 py-2 rounded-full 
                       bg-orange-600 text-white font-medium 
                       hover:bg-orange-500 focus:ring-2 focus:ring-orange-300
                       transition-all duration-200 ease-in-out">
                
                <!-- Profile Image + Name -->
                <div class="flex items-center space-x-2">
                    @if(Auth::user()->profile_image)
                        <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" 
                             alt="Profile" 
                             class="w-9 h-9 rounded-full object-cover border-2 border-white">
                    @else
                        <img src="{{ asset('images/default-profile.png') }}" 
                             alt="Default" 
                             class="w-9 h-9 rounded-full object-cover border-2 border-white">
                    @endif

                    <span class="font-semibold">{{ Auth::user()->name }}</span>
                </div>

                <!-- Dropdown Icon -->
                <svg class="ml-2 w-4 h-4 text-white transition-transform duration-200 group-hover:rotate-180"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 9l-7 7-7-7" />
                </svg>
            </button>
        </x-slot>

        <!-- Dropdown Menu -->
        <x-slot name="content">
    <div id="userDropdownMenu" 
         class="w-48 bg-white border rounded-lg">
        
        <!-- Profile -->
        <a href="{{ route('profile.edit') }}" 
           class="block px-4 py-2 text-gray-700 hover:bg-orange-100 transition">
            Profile
        </a>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full text-left px-4 py-2 text-gray-700 hover:bg-orange-100 transition">
                Logout
            </button>
        </form>
    </div>
</x-slot>



    </x-dropdown>
    
</div>

        </nav>
    </div>
</header>
