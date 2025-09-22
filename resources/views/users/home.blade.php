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
