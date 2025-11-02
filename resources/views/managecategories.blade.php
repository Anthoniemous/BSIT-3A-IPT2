<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Categories - Admin Panel</title>
  <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen flex font-[Poppins] text-gray-800">

  <!-- Sidebar -->
  <aside class="w-72 bg-amber-900 text-amber-50 flex flex-col justify-between shadow-2xl">
    <div>
      <!-- Logo -->
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
      </nav>
    
    </div>

    <!-- Logout -->
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
      <h2 class="text-4xl font-extrabold text-amber-900">Manage Categories</h2>
      <a href="{{ route('admin.categories.create') }}"
        class="bg-amber-700 hover:bg-amber-800 text-white px-5 py-2.5 rounded-lg shadow-md font-semibold transition">
        + Add New Category
      </a>
    </div>

    @if (session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
      </div>
    @endif

    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-lg overflow-hidden">
      <table class="min-w-full table-auto">
        <thead class="bg-amber-700 text-white">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase">#</th>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase">Name</th>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase">Description</th>
            <th class="px-6 py-3 text-center text-sm font-medium uppercase">Actions</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @forelse ($categories as $category)
          <tr class="hover:bg-amber-50 transition">
            <td class="px-6 py-4 text-gray-600">{{ $loop->iteration }}</td>
            <td class="px-6 py-4 font-semibold text-gray-800">{{ $category->name }}</td>
            <td class="px-6 py-4 text-gray-600">{{ $category->description ?? '—' }}</td>
            <td class="px-6 py-4 text-center space-x-2">
              <a href="{{ route('admin.categories.edit', $category->id) }}"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1.5 rounded-lg shadow">
                Edit
              </a>
              <form action="{{ route('admin.categories.delete', $category->id) }}" method="POST" class="inline"
                onsubmit="return confirm('Are you sure you want to delete this category?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                  class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-lg shadow">
                  Delete
                </button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="4" class="px-6 py-4 text-center text-gray-500">No categories found.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>
