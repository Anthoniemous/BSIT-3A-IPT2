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
  </head>

  <body class="font-sans antialiased bg-gradient-to-br from-orange-100 via-orange-200 to-orange-300 text-gray-800">
    <div class="min-h-screen flex flex-col sm:justify-center items-center px-6 py-10">

      <!-- Logo and Heading -->
      <div class="text-center mb-8">
        <a href="/" class="flex flex-col items-center">
          <x-application-logo class="w-20 h-20 mb-3 text-orange-500" />
          <h1 class="text-3xl font-bold text-orange-600">Welcome Back 👋</h1>
          <p class="text-gray-600 text-sm mt-1">Login to continue your journey</p>
        </a>
      </div>

      <!-- Main Card -->
      <div class="w-full sm:max-w-md bg-white border border-orange-300 rounded-2xl shadow-lg p-8">
        {{ $slot }}
      </div>

      <!-- Footer -->
      <footer class="mt-8 text-center text-sm text-gray-600">
        &copy; {{ date('Y') }}
        <span class="text-orange-600 font-semibold">
          {{ config('app.name', 'Laravel') }}
        </span>.
        All rights reserved.
      </footer>
    </div>
  </body>
</html>
