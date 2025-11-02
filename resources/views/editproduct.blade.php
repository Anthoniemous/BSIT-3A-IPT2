<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Product</title>
  <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-700 flex items-center justify-center font-[Inter]">
  <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-2xl w-full max-w-lg p-8 border border-amber-300">

    <div class="text-center mb-6">
    
      <h1 class="mt-2 text-2xl font-semibold text-gray-900">Edit Product</h1>
      <p class="text-sm text-gray-600 mt-1">Modify product details in <span class="font-semibold text-amber-700">Archiora Pets</span></p>
    </div>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
      @csrf
      @method('PUT')

      <div>
        <label for="name" class="block text-gray-800 font-medium mb-1">Product Name</label>
        <input type="text" id="name" name="name" value="{{ $product->name }}" required
          class="w-full px-4 py-2 rounded-xl bg-white border border-gray-300 text-gray-800 placeholder-gray-500
                 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-amber-600 transition">
      </div>

      <div>
        <label for="description" class="block text-gray-800 font-medium mb-1">Description</label>
        <textarea id="description" name="description" rows="3" required
          class="w-full px-4 py-2 rounded-xl bg-white border border-gray-300 text-gray-800 placeholder-gray-500 
                 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-amber-600 transition">{{ $product->description }}</textarea>
      </div>

      <div>
        <label for="price" class="block text-gray-800 font-medium mb-1">Price</label>
        <input type="number" id="price" name="price" step="0.01" value="{{ $product->price }}" required
          class="w-full px-4 py-2 rounded-xl bg-white border border-gray-300 text-gray-800 placeholder-gray-500 
                 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-amber-600 transition">
      </div>

      <div>
        <label for="stock" class="block text-gray-800 font-medium mb-1">Stock Quantity</label>
        <input type="number" id="stock" name="stock" value="{{ $product->stock }}" required
          class="w-full px-4 py-2 rounded-xl bg-white border border-gray-300 text-gray-800 placeholder-gray-500 
                 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-amber-600 transition">
      </div>

      <div>
        <label for="category_id" class="block text-gray-800 font-medium mb-1">Category</label>
        <select id="category_id" name="category_id" required
          class="w-full px-4 py-2 rounded-xl bg-white border border-gray-300 text-gray-800 
                 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-amber-600 transition">
          @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                  {{ $category->name }}
              </option>
          @endforeach
        </select>
      </div>

      <div>
        <label for="image" class="block text-gray-800 font-medium mb-1">Product Image</label>
        <input type="file" id="image" name="image"
          class="w-full text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full 
                 file:border-0 file:text-sm file:font-semibold 
                 file:bg-amber-700 file:text-white hover:file:bg-amber-800 transition">
        @if ($product->image)
                <div class="text-center">
                    <p class="text-gray-600 mb-2">Current Image:</p>
                    <img src="{{ asset('uploads/products/' . $product->image) }}" 
                         alt="Product Image" 
                         class="mx-auto rounded-lg shadow w-32 h-32 object-cover">
                </div>
            @endif
      </div>

      <button type="submit"
        class="w-full bg-amber-700 hover:bg-amber-800 text-white py-2.5 rounded-xl 
               transition font-semibold shadow-md hover:shadow-lg">
        💾 Update Product
      </button>

      <a href="/admin/products"
        class="block text-center w-full bg-gray-200 hover:bg-gray-300 text-gray-800 py-2.5 rounded-xl 
               border border-gray-300 transition font-medium shadow-sm">
        ← Back to Products
      </a>
    </form>
  </div>

</body>
</html>
