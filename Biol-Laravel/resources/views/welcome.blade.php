<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome - My Laravel App</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>
    <div class="overlay">
        <div class="content">
            <h1>Welcome to My Laravel App</h1>
            <p>Build modern applications with Laravel.</p>

            <div class="links">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>
</body>
</html>
