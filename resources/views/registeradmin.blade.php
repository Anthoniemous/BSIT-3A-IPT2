<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Registration</title>
  <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-700 flex items-center justify-center font-[Poppins]">

  <!-- Card Container -->
  <div class="bg-gray-100/95 shadow-2xl rounded-2xl w-full max-w-md p-8 sm:p-10 border border-gray-300">
    
    <!-- Header -->
    <div class="text-center mb-6">
      
      <h1 class="mt-4 text-3xl font-semibold text-gray-900">Admin Registration</h1>
      <p class="text-sm text-gray-600 mt-1">Create your <span class="font-medium text-amber-700">Archiora Pets 🐾</span> account</p>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.register.submit') }}" method="POST" class="space-y-5 text-left">
      @csrf

      <!-- Name -->
      <div>
        <label for="name" class="block text-gray-800 font-medium mb-1">Full Name</label>
        <input type="text" id="name" name="name"
          class="w-full px-4 py-2 rounded-xl bg-white border border-gray-300 text-gray-800 placeholder-gray-500 
                 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-amber-600 transition"
          placeholder="John Doe" required>
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-gray-800 font-medium mb-1">Email Address</label>
        <input type="email" id="email" name="email"
          class="w-full px-4 py-2 rounded-xl bg-white border border-gray-300 text-gray-800 placeholder-gray-500 
                 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-amber-600 transition"
          placeholder="admin@example.com" required>
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-gray-800 font-medium mb-1">Password</label>
        <input type="password" id="password" name="password"
          class="w-full px-4 py-2 rounded-xl bg-white border border-gray-300 text-gray-800 placeholder-gray-500 
                 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-amber-600 transition"
          placeholder="••••••••" required>
      </div>

      <!-- Confirm Password -->
      <div>
        <label for="password_confirmation" class="block text-gray-800 font-medium mb-1">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation"
          class="w-full px-4 py-2 rounded-xl bg-white border border-gray-300 text-gray-800 placeholder-gray-500 
                 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-amber-600 transition"
          placeholder="••••••••" required>
      </div>

      <!-- Register Button -->
      <button type="submit"
        class="w-full bg-amber-700 hover:bg-amber-800 text-white py-2.5 rounded-xl transition font-semibold shadow-md hover:shadow-lg">
        Register
      </button>
    </form>

    <!-- Divider -->
    <div class="flex items-center justify-center mt-5">
      <span class="text-gray-500 text-sm">or</span>
    </div>

    <!-- Link to Login -->
    <div class="text-center mt-2">
      <a href="/login/admin" class="text-sm text-amber-700 hover:text-amber-800 hover:underline transition">
        ← Back to Login
      </a>
    </div>
  </div>

</body>
</html>
