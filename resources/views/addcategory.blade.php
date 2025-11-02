<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add New Category</title>
  <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-700 flex items-center justify-center font-[Inter]">

  <!-- Card Container -->
  <div class="bg-gray-100/95 backdrop-blur-sm p-8 rounded-2xl shadow-2xl w-full max-w-md border border-gray-300">
    <!-- Header -->
    <div class="text-center mb-6">
      
      <h1 class="mt-2 text-3xl font-semibold text-gray-900">Add New Category</h1>
      <p class="text-sm text-gray-600 mt-1">Create a new <span class="font-medium text-amber-700">product category</span></p>
    </div>

    <!-- Error Display -->
    @if ($errors->any())
      <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc ml-5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <!-- Form -->
    <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-5">
      @csrf

      <!-- Category Name -->
      <div>
        <label for="name" class="block text-gray-800 font-medium mb-1 text-left">Category Name</label>
        <input type="text" id="name" name="name"
          class="w-full px-4 py-2 rounded-xl bg-white border border-gray-300 text-gray-800 placeholder-gray-500 
                 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-amber-600 transition"
          placeholder="e.g. Dog Supplies" required>
      </div>

      <!-- Description -->
      <div>
        <label for="description" class="block text-gray-800 font-medium mb-1 text-left">Description</label>
        <textarea id="description" name="description" rows="3"
          class="w-full px-4 py-2 rounded-xl bg-white border border-gray-300 text-gray-800 placeholder-gray-500 
                 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-amber-600 transition"
          placeholder="Enter short description..."></textarea>
      </div>

      <!-- Submit -->
      <button type="submit"
        class="w-full bg-amber-700 text-white py-2.5 rounded-xl font-semibold shadow-md hover:bg-amber-800 transition">
        Add Category
      </button>

      <!-- Back Link -->
      <div class="text-center mt-4">
        <a href="{{ route('admin.categories.index') }}" class="text-sm text-amber-700 hover:underline">← Back to Categories</a>
      </div>
    </form>
  </div>
</body>
</html>
