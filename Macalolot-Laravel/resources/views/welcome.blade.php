<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WristyDeals</title>
  <style>
    /* Navigation link hover glow */
    nav a {
      transition: 0.3s;
    }
    nav a:hover {
      color: #fff;
      text-shadow: 0 0 8px #2563eb, 0 0 12px #2563eb;
    }

    /* Buttons hover glow */
    .btn-login, .btn-register, .btn-shop {
      transition: 0.3s;
    }
    .btn-login:hover {
      background: #2563eb;
      color: #fff;
      box-shadow: 0 0 12px #2563eb, 0 0 24px #2563eb;
    }
    .btn-register:hover {
      background: #1d4ed8; /* darker blue */
      box-shadow: 0 0 12px #2563eb, 0 0 24px #2563eb;
    }
    .btn-shop:hover {
      background: #2563eb;
      color: #fff;
      box-shadow: 0 0 12px #2563eb, 0 0 24px #2563eb;
    }
  </style>
</head>
<body style="margin:0; font-family:Arial, Helvetica, sans-serif;">

  <!-- Background (scrolls with content) -->
  <div style="
    width:100%;
    min-height:100vh;
    background:url('{{ asset('build/assets/watch.jpg') }}') no-repeat center center;
    background-size:cover;
    position:relative;
  ">
    <!-- Dark Overlay -->
    <div style="
      position:absolute;
      top:0;
      left:0;
      width:100%;
      height:100%;
      background:rgba(0,0,0,0.6);
    "></div>

    <!-- Navbar -->
    <header style="width:100%; padding:20px 40px; display:flex; justify-content:space-between; align-items:center; box-sizing:border-box; position:relative; z-index:1; color:#fff;">
      
      <!-- Logo -->
      <div style="font-size:24px; font-weight:bold;">WristyDeals</div>

      <!-- Navigation -->
      <nav style="display:flex; gap:30px; font-weight:500;">
        <a href="#" style="color:#fff; text-decoration:none;">Home</a>
        <a href="#" style="color:#fff; text-decoration:none;">Product</a>
        <a href="#" style="color:#fff; text-decoration:none;">Collection</a>
        <a href="#" style="color:#fff; text-decoration:none;">Blog</a>
        <a href="#" style="color:#fff; text-decoration:none;">Pages</a>
      </nav>

      <!-- Auth Buttons -->
      <div style="display:flex; gap:15px;">
        <a href="{{ route('login') }}"
           class="btn-login"
           style="padding:8px 20px; border:1px solid #fff; border-radius:6px; color:#fff; text-decoration:none; font-weight:500;">
          Log in
        </a>
        <a href="{{ route('register') }}"
           class="btn-register"
           style="padding:8px 20px; background:#2563eb; border-radius:6px; color:#fff; text-decoration:none; font-weight:500;">
          Register
        </a>
      </div>
    </header>

    <!-- Hero Section -->
    <section style="height:calc(100vh - 80px); display:flex; flex-direction:column; justify-content:center; padding:0 80px; color:#fff; position:relative; z-index:1;">
      <div style="max-width:600px;">
        <p style="text-transform:uppercase; font-size:14px; color:#ddd; margin-bottom:15px;">
          Extra deal with our collection
        </p>
        <h1 style="font-size:48px; font-weight:800; line-height:1.2; margin-bottom:25px;">
          Get your new <br> edition watch
        </h1>
        <a href="#"
           class="btn-shop"
           style="padding:14px 32px; background:#fff; border-radius:6px; color:#000; text-decoration:none; font-weight:600; display:inline-block;">
          Shop Now
        </a>
      </div>
    </section>
  </div>

</body>
</html>
