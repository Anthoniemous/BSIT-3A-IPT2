<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>

  <!-- Font & Tailwind -->
  <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-800 via-gray-900 to-gray-950 flex items-center justify-center">

  <!-- Card -->
  <div class="bg-gray-100/95 backdrop-blur-md shadow-2xl rounded-2xl w-full max-w-md p-8 sm:p-10 border border-gray-300">

    <!-- Header -->
    <div class="text-center mb-8">
  <!-- Logo / Icon -->
  <div class="text-center mb-6">
      
      <h1 class="mt-4 text-3xl font-semibold text-gray-900">Admin Login</h1>
      <p class="text-sm text-gray-600 mt-1">Create your <span class="font-medium text-amber-700">Archiora Pets 🐾</span> account</p>
    </div>

  

 


    <!-- Form -->
    <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5 mt-4">
      @csrf

      <!-- Email -->
      <div>
    <label for="email" class="block text-gray-800 font-medium mb-1 text-left">Email Address</label>
    <input type="email" id="email" name="email"
      class="w-full px-4 py-2 rounded-xl bg-white border border-gray-300 text-gray-800 placeholder-gray-500 
             focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-amber-600 transition"
      placeholder="admin@gmail.com" required>
  </div>

      <!-- Password -->
       <div>
    <label for="password" class="block text-gray-800 font-medium mb-1 text-left">Password</label>
    <input type="password" id="password" name="password"
      class="w-full px-4 py-2 rounded-xl bg-white border border-gray-300 text-gray-800 placeholder-gray-500 
             focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-amber-600 transition"
      placeholder="••••••••" required>
  </div>

      <!-- Remember + Forgot -->
      <div class="flex items-center justify-between text-sm">
        <label class="flex items-center space-x-2 text-gray-700">
          <input type="checkbox" class="rounded border-gray-400 focus:ring-amber-600">
          <span>Remember me</span>
        </label>
        <a href="#" class="text-amber-700 hover:text-amber-800 hover:underline transition">Forgot password?</a>
      </div>

      <!-- Login Button -->
      <button type="submit"
        class="w-full bg-amber-700 hover:bg-amber-800 text-white py-2.5 rounded-xl 
               transition font-semibold shadow-md hover:shadow-lg">
        Log In
      </button>

      <!-- Register Button -->
      <a href="/register/admin"
        class="block text-center w-full bg-gray-200 hover:bg-gray-300 text-gray-800 py-2.5 rounded-xl 
               border border-gray-400 transition font-medium shadow-sm">
        Register as Admin
      </a>
    </form>

    <!-- Divider -->
    <div class="flex items-center justify-center mt-5">
      <span class="text-gray-600 text-sm">or</span>
    </div>

    <!-- Back to Home -->
    <div class="text-center mt-2">
      <a href="/" class="text-sm text-gray-700 hover:text-gray-900 hover:underline transition">← Back to Home</a>
    </div>
  </div>

</body>
</html>
