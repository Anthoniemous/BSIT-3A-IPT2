<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .hero {
            background: url('https://images.unsplash.com/photo-1586773860418-d37222d8fce3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1400&q=80') no-repeat center center;
            background-size: cover;
            color: white;
            height: 80vh;
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
        }
        footer {
            background: #0d6efd;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">🏥 MyHospital</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Departments</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Doctors</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    <li class="nav-item"><a class="btn btn-light text-primary ms-2" href="#">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div>
            <h1>Caring for Life</h1>
            <p class="lead">Your health, our priority. Trusted healthcare for you and your family.</p>
            <a href="#" class="btn btn-light btn-lg mt-3">Book Appointment</a>
        </div>
    </section>

    <!-- Services Section -->
    <section class="container my-5">
        <h2 class="text-center mb-4">Our Services</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow p-3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Emergency Care</h5>
                        <p class="card-text">24/7 emergency services with specialized doctors and staff ready to assist you.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow p-3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Outpatient Clinic</h5>
                        <p class="card-text">Comprehensive consultation and diagnostic services for all your needs.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow p-3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Pharmacy</h5>
                        <p class="card-text">On-site pharmacy with trusted medicines and quick prescription refills.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} MyHospital. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
