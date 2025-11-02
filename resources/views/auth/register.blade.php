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
          <h1 class="text-3xl font-bold text-orange-600">Join Us 🐾</h1>
          <p class="text-gray-600 text-sm mt-1">Create your <span class="font-medium text-orange-700">Archiora Pets</span> account</p>
        </a>
      </div>

      <!-- Session Status -->
      <x-auth-session-status class="mb-4" :status="session('status')" />

      <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
          <x-input-label for="name" :value="__('Name')" class="block text-gray-800 font-medium mb-1 text-left" />
          <x-text-input id="name"
            class="block w-full px-4 py-2 rounded-xl bg-gray-200 border border-orange-300 text-gray-800 placeholder-gray-500
                   focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"
            type="text"
            name="name"
            :value="old('name')"
            placeholder="Enter your name"
            required autofocus autocomplete="name" />
          <x-input-error :messages="$errors->get('name')" class="mt-2 text-orange-400" />
        </div>

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
            required autocomplete="username" />
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
            required autocomplete="new-password" />
          <x-input-error :messages="$errors->get('password')" class="mt-2 text-orange-400" />
        </div>

        <!-- Confirm Password -->
        <div>
          <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="block text-gray-800 font-medium mb-1 text-left" />
          <x-text-input id="password_confirmation"
            class="block w-full px-4 py-2 rounded-xl bg-gray-200 border border-orange-300 text-gray-800 placeholder-gray-500
                   focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"
            type="password"
            name="password_confirmation"
            placeholder="Confirm your password"
            required autocomplete="new-password" />
          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-orange-400" />
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between mt-6">
          <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500"
             href="{{ route('login') }}">
            {{ __('Already registered?') }}
          </a>

          <button type="submit"
                  class="px-6 py-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold text-sm rounded-xl shadow-md transition">
            {{ __('Register') }}
          </button>
        </div>
      </form>
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
