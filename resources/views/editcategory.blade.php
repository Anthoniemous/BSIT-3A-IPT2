<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add / Edit Category</title>
  <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-700 flex items-center justify-center font-[Inter]">
  <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-2xl w-full max-w-md p-8 border border-amber-300">

    <div class="text-center mb-6">
      
      <h1 class="mt-2 text-2xl font-semibold text-gray-900">
        {{ isset($category) ? 'Edit Category' : 'Add New Category' }}
      </h1>
      <p class="text-sm text-gray-600 mt-1">Manage product categories efficiently</p>
    </div>

    <form action="{{ isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}"
          method="POST" class="space-y-5">
      @csrf
      @if(isset($category))
        @method('PUT')
      @endif

      <div>
        <label for="name" class="block text-gray-800 font-medium mb-1">Category Name</label>
        <input type="text" id="name" name="name" value="{{ $category->name ?? '' }}" required
          class="w-full px-4 py-2 rounded-xl bg-white border border-gray-300 text-gray-800 placeholder-gray-500 
                 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-amber-600 transition"
          placeholder="Enter category name">
      </div>

      <div>
        <label for="description" class="block text-gray-800 font-medium mb-1">Description</label>
        <textarea id="description" name="description" rows="3"
          class="w-full px-4 py-2 rounded-xl bg-white border border-gray-300 text-gray-800 placeholder-gray-500 
                 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-amber-600 transition"
          placeholder="Describe this category">{{ $category->description ?? '' }}</textarea>
      </div>

      <button type="submit"
        class="w-full bg-amber-700 hover:bg-amber-800 text-white py-2.5 rounded-xl 
               transition font-semibold shadow-md hover:shadow-lg">
        {{ isset($category) ? '💾 Update Category' : '➕ Add Category' }}
      </button>

      <a href="/admin/categories"
        class="block text-center w-full bg-gray-200 hover:bg-gray-300 text-gray-800 py-2.5 rounded-xl 
               border border-gray-300 transition font-medium shadow-sm">
        ← Back to Categories
      </a>
    </form>
  </div>

</body>
</html>
