<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aurora Jewelry</title>
    <script src="https://cdn.tailwindcss.com"></script>
      @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-800 font-sans">

    <!-- Top bar -->
    <div class="bg-white shadow-md py-2 px-6 flex justify-between items-center text-sm">
        <div class="flex space-x-4">
            <div>📍 Location: Poblacion, Lupon, Davao Oriental</div>
            <div>📞 Call Free: 0910-123-4516</div>
        </div>
        <div class="flex space-x-4 items-left">
            <button class="p-2 border rounded-md hover:bg-blue-100 ">
                🔍
            </button>
            <button class="p-2 border rounded-md hover:bg-blue-100 relative">
                🛒
                <span class="absolute -top-2 -left-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-left justify-center">3</span>
            </button>
        </div>
        <!-- User Info -->
                   <div class="flex items-center space-x-3">
                    <span class="font-semibold">Hi, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-blue-600 px-3 py-1 rounded-lg text-white hover:bg-blue-700">
                            Logout
                        </button>
                    </form>
                </div>

                </div>
            </header>
    </div>

    <!-- Logo & Navigation -->
    <header class="flex flex-col items-center py-6 bg-blue-50">
        <h1 class="text-4xl font-bold text-blue-800">Aurora</h1>
        <nav class="mt-4 flex space-x-8 text-blue-700 font-medium uppercase">
            <a href="#" class="hover:text-blue-900">Home</a>
            <a href="#" class="hover:text-blue-900">Product</a>
            <a href="#" class="hover:text-blue-900">Shop</a>
            <a href="#" class="hover:text-blue-900">Blog</a>
            <a href="#" class="hover:text-blue-900">Pages</a>
        </nav>
    </header>

    

    <!-- Slideshow Section -->
    <section class="relative w-full overflow-hidden">
        <!-- Slide 1 -->
        <div class="relative w-full h-[500px] bg-cover bg-center backdrop-blur-sm" style="background-image: url('/images/bg-home.jpg')" >
            <div class="absolute left-10 top-2/4 bg-white/50 p-6 rounded-lg max-w-xs backdrop-blur-sm">
                <h2 class="text-3xl font-bold text-blue-900">Exclusive Offer</h2>
                <p class="mt-2 text-lg text-gray-700">-10% Off This Week</p>
                <button class="mt-4 px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700">Shop Now</button>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="relative w-full h-[700px] bg-cover bg-center mt-4" style="background-image: url('/images/k.jpg');">
            <div class="absolute right-12 top-2/4 bg-white/50 p-6 rounded-lg max-w-xs">
                <h2 class="text-3xl font-bold text-blue-900">Jewelry Arrivals</h2>
                <p class="mt-2 text-lg text-gray-700">$120 - $350</p>
                <button class="mt-4 px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700">Shop Now</button>
            </div>
        </div>
    </section>

     <!-- About Section -->
     <section id="about" class="bg-gradient-to-r from-blue-50 via-blue-100 to-blue-200 py-16">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center px-6">
        <img src="{{ asset('images/about-a.png') }}" alt="About Aurora Jewelry" class="rounded-2xl shadow-lg">
        <div>
            <h2 class="text-3xl font-bold text-blue-900">About Aurora Jewelry</h2>
            <p class="mt-4 text-blue-800 leading-relaxed">
                At <span class="font-semibold text-blue-900">Aurora Jewelry</span>, we believe every piece of jewelry tells a story. 
                From elegant necklaces to sparkling rings and timeless bracelets, our creations are crafted with passion and precision. 
                Each design is meant to bring elegance, charm, and a touch of luxury to your style. 💎
            </p>
            <p class="mt-4 text-blue-800 leading-relaxed">
                What started as a small dream has grown into a destination for jewelry lovers who appreciate 
                both sophistication and quality. Whether you’re celebrating a special occasion or treating yourself, 
                Aurora Jewelry is here to make your moments unforgettable. 💎
            </p>
            <a href="#collection" class="inline-block mt-6 px-6 py-3 bg-blue-900 text-white rounded-full shadow-md hover:bg-blue-800 transition">
                Explore Our Collection
            </a>
        </div>
    </div>
</section>



</body>
</html>
