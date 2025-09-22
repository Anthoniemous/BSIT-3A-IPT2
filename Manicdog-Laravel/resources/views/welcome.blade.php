<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Matcha Bliss</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    /* Boba Bliss-style diagonal stripes background */
    body {
      background: repeating-linear-gradient(
        45deg,
        #b4c48a 0,
        #b4c48a 20px,
        #a3b479 20px,
        #a3b479 40px
      );
    }

    /* Hero buttons */
    .hero-btn {
      background: linear-gradient(135deg, #7cb342, #689f38);
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .hero-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    /* Layered shapes */
    .shape {
      position: absolute;
      border-radius: 50%;
      opacity: 0.4;
    }
  </style>
</head>
<body class="min-h-screen flex justify-center items-center px-6">

  <div class="max-w-7xl w-full flex flex-col lg:flex-row bg-white shadow-2xl rounded-3xl overflow-hidden relative">

    <!-- LEFT -->
    <div class="flex-1 p-12 flex flex-col justify-center">
      <div class="flex items-center space-x-3 mb-6 text-green-800">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M4 16c0 1.657 1.343 3 3 3h10c1.657 0 3-1.343 3-3V7H4v9z"/>
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M8 7V4m8 3V4"/>
        </svg>
        <span class="font-bold text-2xl tracking-wide">MATCHA BLISS</span>
      </div>

      <h1 class="text-5xl md:text-6xl font-extrabold text-green-900 leading-tight">
        Sip Serenity <br>
        <span class="text-green-700">Every Day</span>
      </h1>

      <p class="mt-6 text-lg md:text-xl text-gray-700 max-w-md">
        Indulge in the calm of premium matcha drinks. Freshly prepared for a refreshing, mindful moment.
      </p>

      <div class="mt-8 flex space-x-6">
        <a href="{{ route('register') }}" class="hero-btn text-white font-semibold py-3 px-8 rounded-xl shadow-lg">
          Get Started
        </a>
        <a href="{{ route('login') }}" class="px-8 py-3 bg-green-100 hover:bg-green-200 text-green-800 font-semibold rounded-xl transition">
          Login
        </a>
      </div>

      <div class="mt-10 text-green-800 text-lg font-semibold">
        www.matchabliss.com
      </div>

      <div class="mt-6 flex space-x-6 text-green-700 text-2xl">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-tiktok"></i></a>
      </div>
    </div>

    <!-- RIGHT with background image -->
    <div class="flex-1 relative flex items-center justify-center p-6 overflow-hidden rounded-tr-3xl rounded-br-3xl"
         style="background-image: url('{{ asset('images/matcha-bg.png') }}'); 
                background-size: cover; 
                background-position: center;">
      
      <!-- Optional layered shapes for extra style -->
      <div class="shape w-72 h-72 bg-green-200 top-[-80px] right-[-80px] rotate-45"></div>
      <div class="shape w-96 h-96 bg-green-100 bottom-[-100px] left-[-60px] rotate-12"></div>

      <!-- Main matcha image in front -->
      <img src="{{ asset('images/matcha.png') }}"
           alt="Matcha drink"
           class="w-80 md:w-[28rem] drop-shadow-2xl rounded-3xl relative z-10">
    </div>

  </div>

</body>
</html>
