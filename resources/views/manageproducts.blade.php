<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Products - Admin Panel</title>
  <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen flex font-[Poppins] text-gray-800">

  <!-- Sidebar -->
  <aside class="w-72 bg-amber-900 text-amber-50 flex flex-col justify-between shadow-2xl">
    <div>
      <div class="text-center py-8 border-b border-amber-800">
        <h1 class="text-3xl font-extrabold tracking-wide text-white">Admin Panel</h1>
        <p class="text-amber-300 text-sm mt-1">Welcome, Admin!</p>
      </div>

      <!-- Navigation -->
      <nav class="mt-8 space-y-2 px-6">
        <a href="/admin/dashboard"
          class="flex items-center gap-3 py-3 px-5 rounded-lg {{ request()->routeIs('dashboardadmin') ? 'bg-amber-800' : 'bg-amber-950/60' }} hover:bg-amber-800 transition duration-300 font-medium shadow-md">
          <span class="text-lg">🏠</span> Dashboard
        </a>
        <a href="/admin/categories"
          class="flex items-center gap-3 py-3 px-5 rounded-lg {{ request()->routeIs('admin.categories.index') ? 'bg-amber-800' : 'bg-amber-950/60' }} hover:bg-amber-800 transition duration-300 font-medium shadow-md">
          <span class="text-lg">🗂️</span> Manage Categories
        </a>
        <a href="/admin/products"
          class="flex items-center gap-3 py-3 px-5 rounded-lg {{ request()->routeIs('manageproducts') ? 'bg-amber-800' : 'bg-amber-950/60' }} hover:bg-amber-800 transition duration-300 font-medium shadow-md">
          <span class="text-lg">📦</span> Manage Products
        </a>
        <a href="{{ route('admin.orders') }}"
          class="flex items-center gap-3 py-3 px-5 rounded-lg {{ request()->routeIs('admin.orders') ? 'bg-amber-800' : 'bg-amber-950/60' }} hover:bg-amber-800 transition duration-300 font-medium shadow-md">
          <span class="text-lg">📋</span> Manage Orders
        </a>
      </nav>

    </div>

    <div class="px-6 mb-8">
      <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit"
          class="w-full bg-red-600 hover:bg-red-700 text-white py-2.5 rounded-lg transition font-semibold shadow-md hover:shadow-lg">
          🚪 Logout
        </button>
      </form>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-10 backdrop-blur-sm bg-amber-50/70 overflow-y-auto">
     <div class="flex justify-between items-center mb-8">
      <h2 class="text-4xl font-extrabold text-amber-900">Manage Products</h2>
      <div class="flex gap-3">
        <a href="/admin/products/create"
           class="bg-amber-700 hover:bg-amber-800 text-white px-5 py-2.5 rounded-lg shadow-md font-semibold transition">
           + Add New Product
        </a>
      </div>
    </div>

    @if (session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
      </div>
    @endif

    <!-- FILTERS: brand / category / min / max -->
    @php
      $productCollection = collect($products);
      $brands = $productCollection->pluck('brand')->filter()->unique()->values();
      $categories = $productCollection->map(fn($p) => $p->category->name ?? null)->filter()->unique()->values();
    @endphp

    <div class="bg-white/80 p-4 rounded-2xl shadow mb-6 flex flex-wrap gap-3 items-center">
      <div class="flex items-center gap-2">
        <label class="text-sm font-medium text-gray-700">Brand</label>
        <select id="filterBrand" class="border rounded px-3 py-2">
          <option value="">All Brands</option>
          @foreach ($brands as $b)
            <option value="{{ $b }}">{{ $b }}</option>
          @endforeach
        </select>
      </div>

      <div class="flex items-center gap-2">
        <label class="text-sm font-medium text-gray-700">Category</label>
        <select id="filterCategory" class="border rounded px-3 py-2">
          <option value="">All Categories</option>
          @foreach ($categories as $c)
            <option value="{{ $c }}">{{ $c }}</option>
          @endforeach
        </select>
      </div>

      <div class="flex items-center gap-2">
        <label class="text-sm font-medium text-gray-700">Min ₱</label>
        <input id="filterMin" type="number" min="0" step="0.01" class="border rounded px-3 py-2 w-28" placeholder="0">
      </div>

      <div class="flex items-center gap-2">
        <label class="text-sm font-medium text-gray-700">Max ₱</label>
        <input id="filterMax" type="number" min="0" step="0.01" class="border rounded px-3 py-2 w-28" placeholder="">
      </div>

      <div class="ml-auto flex gap-2">
        <button id="clearFilters" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-3 py-2 rounded">Clear</button>
      </div>
    </div>
    <!-- /FILTERS -->

    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-lg overflow-hidden">
      <table class="min-w-full table-auto">
        <thead class="bg-amber-700 text-white">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase">#</th>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase">Image</th>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase">Name</th>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase">Category</th>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase">Description</th>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase">Price</th>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase">Stock</th>
            <th class="px-6 py-3 text-center text-sm font-medium uppercase">Actions</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
         @forelse ($products as $product)
          <tr class="hover:bg-amber-50 transition"
              data-id="{{ $product->id }}"
              data-brand="{{ $product->brand }}"
              data-category="{{ $product->category->name ?? '' }}"
              data-price="{{ $product->price }}"
              data-name="{{ $product->name }}"
              data-image="{{ $product->image ? asset('uploads/products/' . $product->image) : '' }}">
            <td class="px-6 py-4 text-gray-600">{{ $loop->iteration }}</td>
            <td class="px-6 py-4">
              @if ($product->image)
                <img src="{{ asset('uploads/products/' . $product->image) }}"
                     alt="Product Image"
                     class="w-16 h-16 object-cover rounded-lg shadow">
              @else
                <span class="text-gray-400 italic">No image</span>
              @endif
            </td>
            <td class="px-6 py-4 font-semibold text-gray-800">{{ $product->name }}</td>
            <td class="px-6 py-4 text-gray-600">{{ $product->category->name ?? 'Uncategorized' }}</td>
            <td class="px-6 py-4 text-gray-600">{{ Str::limit($product->description, 40) }}</td>
            <td class="px-6 py-4 text-gray-800 font-medium">₱{{ number_format($product->price, 2) }}</td>
            <td class="px-6 py-4 text-gray-800">{{ $product->stock }}</td>
            <td class="px-6 py-4 flex justify-center space-x-3">
              <a href="{{ route('admin.products.edit', $product->id) }}"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1.5 rounded-lg shadow">Edit</a>

              <form action="{{ route('admin.products.delete', $product->id) }}" method="POST"
                onsubmit="return confirm('Are you sure you want to delete this product?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                  class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-lg shadow">Delete</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="8" class="px-6 py-4 text-center text-gray-500">No products found.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </main>

  <!-- FILTER SCRIPT -->
  <script>
    // DOM helper & normalization
    function normalizePrice(v) {
      if (v === null || v === undefined || v === '') return undefined;
      const n = Number(v);
      return Number.isFinite(n) ? n : undefined;
    }

    function filterProducts() {
      const brand = document.getElementById('filterBrand').value;
      const category = document.getElementById('filterCategory').value;
      let min = normalizePrice(document.getElementById('filterMin').value);
      let max = normalizePrice(document.getElementById('filterMax').value);
      if (min !== undefined && max !== undefined && min > max) [min, max] = [max, min];

      document.querySelectorAll('tbody > tr[data-price]').forEach(row => {
        const rowBrand = (row.dataset.brand || '').toString();
        const rowCategory = (row.dataset.category || '').toString();
        const rowPrice = normalizePrice(row.dataset.price);

        if (brand && brand !== '' && rowBrand !== brand) {
          row.style.display = 'none'; return;
        }
        if (category && category !== '' && rowCategory !== category) {
          row.style.display = 'none'; return;
        }
        if (min !== undefined && (rowPrice === undefined || rowPrice < min)) {
          row.style.display = 'none'; return;
        }
        if (max !== undefined && (rowPrice === undefined || rowPrice > max)) {
          row.style.display = 'none'; return;
        }
        row.style.display = '';
      });
    }

    // Wire up events
    document.getElementById('filterBrand').addEventListener('change', filterProducts);
    document.getElementById('filterCategory').addEventListener('change', filterProducts);
    document.getElementById('filterMin').addEventListener('input', filterProducts);
    document.getElementById('filterMax').addEventListener('input', filterProducts);
    document.getElementById('clearFilters').addEventListener('click', function (e) {
      e.preventDefault();
      document.getElementById('filterBrand').value = '';
      document.getElementById('filterCategory').value = '';
      document.getElementById('filterMin').value = '';
      document.getElementById('filterMax').value = '';
      filterProducts();
    });
  </script>

</body>
</html>