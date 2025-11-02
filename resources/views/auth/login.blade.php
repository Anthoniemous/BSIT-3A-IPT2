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
          <h1 class="text-3xl font-bold text-orange-600">Welcome Back 👋</h1>
          <p class="text-gray-600 text-sm mt-1">Login to your <span class="font-medium text-orange-700">Archiora Pets 🐾</span> account</p>
        </a>
      </div>

      <!-- Session Status -->
      <x-auth-session-status class="mb-4" :status="session('status')" />

      <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
          <x-input-label for="email" :value="__('Email')" class="block text-gray-800 font-medium mb-1 text-left" />
          <x-text-input id="email"
            class="block w-full px-4 py-2 rounded-xl bg-gray-200 border border-orange-300 text-gray-800 placeholder-gray-500
                   focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"
            type="email"
            name="email"
            :value="old('email')"
            placeholder="Enter your email"
            required autofocus autocomplete="username" />
          <x-input-error :messages="$errors->get('email')" class="mt-2 text-orange-400" />
        </div>

        <!-- Password -->
        <div>
          <x-input-label for="password" :value="__('Password')" class="block text-gray-800 font-medium mb-1 text-left" />
          <x-text-input id="password"
            class="block w-full px-4 py-2 rounded-xl bg-gray-200 border border-orange-300 text-gray-800 placeholder-gray-500
                   focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"
            type="password"
            name="password"
            placeholder="Enter your password"
            required autocomplete="current-password" />
          <x-input-error :messages="$errors->get('password')" class="mt-2 text-orange-400" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between text-sm">
          <label class="flex items-center space-x-2 text-gray-700">
            <input id="remember_me" type="checkbox"
                   class="rounded border-gray-400 focus:ring-orange-500"
                   name="remember">
            <span>{{ __('Remember me') }}</span>
          </label>
          @if (Route::has('password.request'))
            <a class="text-orange-600 hover:text-orange-700 hover:underline transition"
               href="{{ route('password.request') }}">
              {{ __('Forgot your password?') }}
            </a>
          @endif
        </div>

        <!-- Actions -->
        <div class="flex gap-2 mt-6">
          <button type="submit"
                  class="w-full bg-orange-500 hover:bg-orange-600 text-white py-2.5 rounded-xl 
                         transition font-semibold shadow-md hover:shadow-lg">
            {{ __('Log in') }}
          </button>

          @if (Route::has('register'))
            <a href="{{ route('register') }}"
               class="w-full text-center bg-gray-100 hover:bg-gray-200 text-gray-800 py-2.5 rounded-xl 
                      border border-orange-300 transition font-medium shadow-sm">
              {{ __('Register') }}
            </a>
          @endif
        </div>
      </form>

      <!-- Divider -->
      <div class="flex items-center justify-center mt-5">
        <span class="text-gray-600 text-sm">{{ __('or') }}</span>
      </div>

      <!-- Continue with Google -->
      <div class="text-center mt-2">
        <a href="{{ route('google-auth') }}"
           class="inline-flex items-center px-4 py-2 border border-orange-300 rounded-xl shadow-sm bg-white text-orange-600 hover:bg-orange-50 transition">
          <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google" class="w-5 h-5 mr-2">
          {{ __('Continue with Google') }}
        </a>
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
