<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link
      href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
      rel="stylesheet"
    />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
      /* Custom pet-themed background with subtle paw print pattern */
      body {
        background: linear-gradient(135deg, #ffedd5 0%, #fed7aa 25%, #fdba74 50%, #fb923c 75%, #f97316 100%);
        background-size: 400% 400%;
        animation: gradientShift 15s ease infinite;
      }
      @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
      }
      /* Subtle paw print overlay */
      body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M50 10c-5 0-9 4-9 9s4 9 9 9 9-4 9-9-4-9-9-9zm-20 20c-5 0-9 4-9 9s4 9 9 9 9-4 9-9-4-9-9-9zm40 0c-5 0-9 4-9 9s4 9 9 9 9-4 9-9-4-9-9-9zm-20 20c-5 0-9 4-9 9s4 9 9 9 9-4 9-9-4-9-9-9z'/%3E%3C/g%3E%3C/svg%3E");
        background-size: 100px 100px;
        pointer-events: none;
        z-index: -1;
      }
    </style>
  </head>

  <body class="font-sans antialiased text-gray-800 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-white/95 backdrop-blur-md shadow-2xl rounded-2xl p-8 sm:p-10 border border-orange-300">

      <!-- Logo and Heading -->
      <div class="text-center mb-8">
        <a href="/" class="flex flex-col items-center">
          <x-application-logo class="w-20 h-20 mb-3 text-orange-500" />
          <h1 class="text-3xl font-bold text-orange-600">Verify Your Email 🐾</h1>
          <p class="text-gray-600 text-sm mt-1">Secure your <span class="font-medium text-orange-700">Archiora Pets</span> account</p>
        </a>
      </div>

      <!-- Main Content -->
      <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
      </div>

      @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
          {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
      @endif

      <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
          @csrf

          <button type="submit"
                  class="px-6 py-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold text-sm rounded-xl shadow-md transition">
            {{ __('Resend Verification Email') }}
          </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
          @csrf

          <button type="submit" class="underline text-sm text-gray-600 hover:text-orange-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition">
            {{ __('Log Out') }}
          </button>
        </form>
      </div>
    </div>

    <!-- Footer -->
    <footer class="mt-8 text-center text-sm text-gray-600 absolute bottom-4 left-1/2 transform -translate-x-1/2">
      &copy; {{ date('Y') }}
      <span class="text-orange-600 font-semibold">
        {{ config('app.name', 'Laravel') }}
      </span>.
      All rights reserved.
    </footer>
  </body>
</html>
