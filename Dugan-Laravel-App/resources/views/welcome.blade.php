<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RideNow - Transport & Hailing Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .hero {
            background: url('https://images.unsplash.com/photo-1529070538774-1843cb3265df?auto=format&fit=crop&w=1400&q=80') no-repeat center center;
            background-size: cover;
            color: white;
            height: 85vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .card {
            border-radius: 15px;
            transition: transform 0.2s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        footer {
            background: #0d6efd;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        .hero h1 {
    color: #ffcc00; /* gold yellow */
}

.hero p {
    color: #ca0000f9; /* bright cyan */
}

    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">🚖 SakayKana</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Drivers</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>

                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="btn btn-light text-primary ms-2" href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="btn btn-light text-primary ms-2" href="{{ route('login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-outline-light ms-2" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div>
            <h1>Fast, Safe, and Affordable Rides</h1>
            <p class="lead">Your ride is just a tap away – anytime, bisan asa!.</p>
            <a href="#" class="btn btn-light btn-lg mt-3">Book a Ride</a>
        </div>
    </section>

    <!-- Services Section -->
    <section class="container my-5">
        <h2 class="text-center mb-4">Our Services</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow p-3 h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">City Rides</h5>
                        <p class="card-text">Quick and reliable rides within the city with trusted drivers and affordable pricing.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow p-3 h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Airport Transfers</h5>
                        <p class="card-text">On-time drop-offs and pickups for your flights, so you never miss your schedule.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow p-3 h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Delivery</h5>
                        <p class="card-text">Send and receive packages quickly with our secure and efficient delivery option.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Driver Recruitment Section -->
    <section class="container my-5 text-center">
        <div class="p-5 bg-light rounded shadow">
            <h2>Become a Driver</h2>
            <p class="lead">Earn extra income by joining our driver network. Flexible hours, great benefits.</p>
            <a href="#" class="btn btn-primary btn-lg">Join as Driver</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} RideNow. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
