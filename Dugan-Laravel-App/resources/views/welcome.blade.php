<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DwardEngines - Luxury Car Dealership</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #0d0d0d;
            color: #e0e0e0;
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar {
            background: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(255, 215, 0, 0.2);
        }

        .navbar-brand {
            color: #FFD700 !important;
            font-weight: 700;
            font-size: 1.5rem;
        }

        .nav-link {
            color: #ccc !important;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #FFD700 !important;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.8)),
                        url('https://images.unsplash.com/photo-1502877338535-766e1452684a?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            flex-direction: column;
        }

        .hero h1 {
            color: #FFD700;
            font-size: 3.5rem;
            font-weight: 700;
        }

        .hero p {
            color: #f0f0f0;
            font-size: 1.2rem;
        }

        .hero .btn {
            background: #FFD700;
            color: #000;
            border-radius: 30px;
            padding: 12px 35px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .hero .btn:hover {
            background: #fff;
        }

        /* Section Titles */
        h2.section-title {
            color: #FFD700;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 40px;
        }

        /* Services Section */
        .card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            text-align: center;
            padding: 30px;
            color: #f0f0f0;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            background: rgba(255, 215, 0, 0.1);
        }

        .card i {
            font-size: 2.8rem;
            color: #FFD700;
            margin-bottom: 15px;
        }

        /* Featured Cars */
        .car-card {
            background: #111;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
            transition: transform 0.3s ease;
        }

        .car-card:hover {
            transform: scale(1.03);
        }

        .car-img {
            width: 100%;
            height: 230px;
            object-fit: cover;
        }

        .car-card h5 {
            color: #FFD700;
            font-weight: 600;
        }

        .car-card p {
            color: #bbb;
        }

        /* Call to Action */
        .cta {
            background: linear-gradient(90deg, #111, #222);
            color: #fff;
            padding: 60px 0;
            text-align: center;
        }

        .cta h2 {
            color: #FFD700;
            font-weight: 700;
        }

        .cta .btn {
            background: #FFD700;
            color: #000;
            border-radius: 30px;
            padding: 12px 35px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .cta .btn:hover {
            background: #fff;
        }

        footer {
            background: #000;
            color: #999;
            text-align: center;
            padding: 20px 0;
            border-top: 1px solid rgba(255, 215, 0, 0.2);
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">DwardEngines</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Inventory</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Financing</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>

                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="btn btn-warning text-dark ms-2" href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="btn btn-outline-light ms-2" href="{{ route('login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-outline-warning ms-2" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero">
        <h1>Drive Luxury. Live Prestige.</h1>
        <p>Experience world-class performance and timeless design with DwardEngines.</p>
        <a href="#" class="btn mt-3">Explore Cars</a>
    </section>

    <!-- Services -->
    <section class="container my-5">
        <h2 class="text-center section-title">Our Services</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card">
                    <i class="bi bi-car-front-fill"></i>
                    <h5>Buy a Car</h5>
                    <p>Choose from a curated selection of premium vehicles from trusted brands.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <i class="bi bi-cash-stack"></i>
                    <h5>Sell Your Car</h5>
                    <p>Sell your luxury vehicle quickly and securely with expert appraisal assistance.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <i class="bi bi-credit-card-2-front-fill"></i>
                    <h5>Financing Options</h5>
                    <p>Exclusive low-interest plans tailored to your lifestyle and financial goals.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Cars -->
    <section class="container my-5">
        <h2 class="text-center section-title">Featured Cars</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="car-card">
                    <img src="https://images.unsplash.com/photo-1502877338535-766e1452684a?auto=format&fit=crop&w=800&q=80" alt="Toyota Supra" class="car-img">
                    <div class="p-3">
                        <h5>Toyota Supra 2024</h5>
                        <p>Automatic | Turbocharged</p>
                        <h6 class="fw-bold text-warning">₱4,300,000</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="car-card">
                    <img src="https://images.unsplash.com/photo-1617137968427-85924c800a22?auto=format&fit=crop&w=800&q=80" alt="BMW M4" class="car-img">
                    <div class="p-3">
                        <h5>BMW M4 Competition</h5>
                        <p>Automatic | Twin-Turbo</p>
                        <h6 class="fw-bold text-warning">₱8,500,000</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="car-card">
                    <img src="https://images.unsplash.com/photo-1617137968427-85924c800a22?auto=format&fit=crop&w=800&q=80" alt="Mercedes AMG" class="car-img">
                    <div class="p-3">
                        <h5>Mercedes-Benz AMG GT</h5>
                        <p>Automatic | V8 Biturbo</p>
                        <h6 class="fw-bold text-warning">₱12,000,000</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta">
        <div class="container">
            <h2>Own the Road. Define Luxury.</h2>
            <p class="lead mb-4">Schedule a test drive today and feel the power of perfection.</p>
            <a href="#" class="btn">Book Test Drive</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} DwardEngines. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
