<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - {{ config('app.name', 'Laravel') }}</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
            color: white;
        }

        /* Background image */
        .bg {
            background: url("{{ asset('images/background.jpg') }}") no-repeat center center/cover;
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        /* Overlay for readability */
        .overlay {
            background: rgba(0, 0, 0, 0.5);
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        /* Navigation bar */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 50px;
            background: rgba(0, 0, 0, 0.6);
            position: relative;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #ddd;
        }

        /* Search */
        .search-box {
            display: flex;
        }

        .search-box input {
            padding: 5px 10px;
            border: none;
            border-radius: 5px 0 0 5px;
            outline: none;
        }

        .search-box button {
            padding: 6px 12px;
            border: none;
            background: #007BFF;
            color: white;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }

        .search-box button:hover {
            background: #0056b3;
        }

        /* Content */
        .content {
            height: calc(100% - 70px);
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            flex-direction: column;
            padding: 20px;
        }

        .content h1 {
            font-size: 50px;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <!-- Background -->
    <div class="bg"></div>
    <div class="overlay"></div>

    <!-- Navigation -->
    <nav>
        <div class="logo">
            <strong>{{ config('app.name', 'Laravel') }}</strong>
        </div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Help</a></li>
        </ul>
        <form class="search-box" action="#" method="GET">
            <input type="text" name="search" placeholder="Search...">
            <button type="submit">Go</button>
        </form>
    </nav>

    <!-- Main Content -->
    <div class="content">
        <h1>Welcome to {{ config('app.name', 'Laravel') }}</h1>
        <p>Your simple Laravel homepage with navigation and background image.</p>
    </div>
</body>
</html>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="relative min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/background.jpg') }}')">
        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>

        <!-- Navigation -->
        <nav class="relative z-10 flex justify-between items-center px-8 py-4 bg-white bg-opacity-70 shadow-md">
            <div class="text-xl font-bold text-gray-800">
                {{ config('app.name', 'Laravel') }}
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

            <!-- Search + Logout -->
            <div class="flex items-center space-x-3">
                <form action="#" method="GET" class="flex">
                    <input type="text" name="search" placeholder="Search..."
                           class="px-3 py-2 rounded-l-md border border-gray-300 focus:outline-none focus:ring focus:ring-pink-300">
                    <button type="submit"
                            class="px-4 py-2 bg-pink-400 text-white rounded-r-md hover:bg-pink-500 transition">
                        Go
                    </button>
                </form>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="px-4 py-2 rounded-full bg-red-300 text-gray-800 hover:bg-red-400 shadow-md transition">
                        Logout
                    </button>
                </form>
            </div>
        </nav>

        <!-- Main content -->
        <div class="relative z-10 flex flex-col justify-center items-center text-center text-white py-32">
            <h1 class="text-5xl font-bold mb-6">Welcome to {{ config('app.name', 'Laravel') }}</h1>
            <p class="text-lg">This is your home page, just like the dashboard — but sweeter with pastel candy vibes 🍬</p>
        </div>
    </div>
</x-app-layout>
