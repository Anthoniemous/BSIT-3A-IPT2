<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
       <div style="min-height:100vh; display:flex; flex-direction:column; justify-content:center; align-items:center; padding-top:1.5rem; background: linear-gradient(90deg,rgba(28, 156, 156, 1) 0%, rgba(20, 110, 110, 1) 39%, rgba(10, 66, 66, 1) 99%);">
    <div>
    <a href="/">
        <img src="/build/assets/wlogo.png" alt="Logo" style="width:150px; height:150px;">
    </a>
</div>


    <div style="width:100%; max-width:28rem; margin-top:1.5rem; padding:1.5rem; background:rgba(0,0,0,0.7); box-shadow:0 4px 6px rgba(0,0,0,0.1); border-radius:0.5rem; color:black;">
        {{ $slot }}
    </div>
</div>

    </body>
</html>
