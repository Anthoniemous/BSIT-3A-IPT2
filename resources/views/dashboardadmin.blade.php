<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard - Archiora Pets</title>
  <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
      <nav class="mt-6 space-y-2 px-6">
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
        <!-- Add this new link -->
        <a href="{{ route('admin.orders') }}"
          class="flex items-center gap-3 py-3 px-5 rounded-lg {{ request()->routeIs('admin.orders') ? 'bg-amber-800' : 'bg-amber-950/60' }} hover:bg-amber-800 transition duration-300 font-medium shadow-md">
          <span class="text-lg">📋</span> Manage Orders
        </a>
      </nav>
    </div>

    <!-- Logout -->
    <div class="px-6 mb-8">
      <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit"
          class="w-full bg-red-600 hover:bg-red-700 text-white py-2.5 rounded-lg transition duration-300 font-semibold shadow-md hover:shadow-lg">
          🚪 Logout
        </button>
      </form>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-10 backdrop-blur-sm bg-amber-50/70 overflow-y-auto">

    <!-- Header -->
    <header class="flex justify-between items-center mb-10">
      <div>
        <h2 class="text-4xl font-extrabold text-amber-900">Dashboard Overview</h2>
        <p class="text-gray-600 mt-1">Quick summary of your admin activities</p>
      </div>
      @php $admin = Auth::guard('admin')->user(); @endphp

<div class="relative inline-block text-left">
    <button id="adminDropdownBtn" 
        class="flex items-center space-x-3 px-3 py-2 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-orange-50 transition"
        

        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <img 
            src="{{ $admin && $admin->profile_image 
                ? asset('storage/' . $admin->profile_image) 
                : 'https://ui-avatars.com/api/?name=' . urlencode($admin ? $admin->name : 'Admin') . '&background=B45309&color=fff' }}"
            alt="Admin Avatar"
            class="w-10 h-10 rounded-full border-2 border-amber-700 shadow-md object-cover" />
        <span class="text-gray-800 font-semibold">{{ $admin ? $admin->name : 'Admin User' }}</span>

        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <!-- Dropdown Menu -->
    <div id="adminDropdownMenu" 
        class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
        <a href="{{ route('admin.profile') }}" 
           class="block px-4 py-2 text-gray-700 hover:bg-orange-100 transition">Profile</a>

        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit"
                class="w-full text-left px-4 py-2 text-gray-700 hover:bg-orange-100 transition">
                Logout
            </button>
        </form>
    </div>
</div>

      



  
<script>
document.getElementById('adminDropdownBtn').addEventListener('click', function() {
    const menu = document.getElementById('adminDropdownMenu');
    menu.classList.toggle('hidden');
});
</script>

    </header>

  
    <!-- Stats Cards -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-8 mb-12">  <!-- Updated to 6 columns -->
      <div
        class="bg-white/80 backdrop-blur-md rounded-2xl shadow-lg p-6 border-t-4 border-amber-600 hover:scale-105 hover:shadow-2xl transition duration-300"
      >
        <h3 class="text-gray-600 text-sm font-medium">Total Products</h3>
        <p class="text-4xl font-extrabold text-gray-900 mt-3">{{ $totalProducts }}</p>
        <span class="text-sm text-gray-500">Updated just now</span>
      </div>

      <div
        class="bg-white/80 backdrop-blur-md rounded-2xl shadow-lg p-6 border-t-4 border-green-600 hover:scale-105 hover:shadow-2xl transition duration-300"
      >
        <h3 class="text-gray-600 text-sm font-medium">Total Categories</h3>
        <p class="text-4xl font-extrabold text-gray-900 mt-3">{{ $totalCategories }}</p>
        <span class="text-sm text-gray-500">Active categories</span>
      </div>

      <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-lg p-6 border-t-4 border-yellow-500 hover:scale-105 hover:shadow-2xl transition duration-300">
        <h3 class="text-gray-600 text-sm font-medium">Pending Orders</h3>
        <p class="text-4xl font-extrabold text-gray-900 mt-3">{{ $pendingOrders }}</p>  <!-- Updated -->
        <span class="text-sm text-gray-500">Awaiting confirmation</span>
      </div>

      <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-lg p-6 border-t-4 border-red-500 hover:scale-105 hover:shadow-2xl transition duration-300">
        <h3 class="text-gray-600 text-sm font-medium">Users Registered</h3>
        <p class="text-4xl font-extrabold text-gray-900 mt-3">{{ $totalUsers }}</p>  <!-- Updated -->
        <span class="text-sm text-gray-500">New this month</span>
      </div>

      <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-lg p-6 border-t-4 border-red-500 hover:scale-105 hover:shadow-2xl transition duration-300">
        <h3 class="text-gray-600 text-sm font-medium">Cancelled Orders</h3>
        <p class="text-4xl font-extrabold text-gray-900 mt-3">{{ $totalCancelledOrders }}</p>
        <span class="text-sm text-gray-500">Total cancelled</span>
      </div>

      <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-lg p-6 border-t-4 border-blue-500 hover:scale-105 hover:shadow-2xl transition duration-300">
        <h3 class="text-gray-600 text-sm font-medium">Total Sales</h3>
        <p class="text-3xl font-extrabold text-gray-900 mt-3 break-words">₱{{ number_format($totalSales, 2) }}</p>  <!-- Reduced font size and added break-words for wrapping -->
        <span class="text-sm text-gray-500">From completed orders</span>
      </div>
    </section>

    <!-- New: Charts and Tables Section -->
    <section class="mb-12">
      <h3 class="text-2xl font-bold text-gray-800 mb-5">Analytics</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">  <!-- Responsive grid to reduce scrolling -->

        <!-- Marketable Products Chart -->
        <div class="bg-white/90 backdrop-blur-sm shadow-xl rounded-2xl p-4">
          <h4 class="text-lg font-semibold mb-3">Most Marketable Products</h4>
          <canvas id="marketableChart" width="400" height="150" onclick="toggleTable('marketableTable')" class="cursor-pointer"></canvas>  <!-- Reduced height -->
          <table id="marketableTable" class="hidden mt-3 w-full table-auto border-collapse border border-gray-300 text-sm">
            <thead>
              <tr class="bg-gray-100">
                <th class="border border-gray-300 px-2 py-1">Product</th>
                <th class="border border-gray-300 px-2 py-1">Total Sold</th>
              </tr>
            </thead>
            <tbody>
              @foreach($marketableProducts as $product)
                <tr>
                  <td class="border border-gray-300 px-2 py-1">{{ $product->name }}</td>
                  <td class="border border-gray-300 px-2 py-1">{{ $product->total_sold }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- Non-Marketable Products Chart -->
        <div class="bg-white/90 backdrop-blur-sm shadow-xl rounded-2xl p-4">
          <h4 class="text-lg font-semibold mb-3">Non-Marketable Products</h4>
          <canvas id="nonMarketableChart" width="400" height="150" onclick="toggleTable('nonMarketableTable')" class="cursor-pointer"></canvas>  <!-- Reduced height -->
          <table id="nonMarketableTable" class="hidden mt-3 w-full table-auto border-collapse border border-gray-300 text-sm">
            <thead>
              <tr class="bg-gray-100">
                <th class="border border-gray-300 px-2 py-1">Product</th>
                <th class="border border-gray-300 px-2 py-1">Total Sold</th>
              </tr>
            </thead>
            <tbody>
              @foreach($nonMarketableProducts as $product)
                <tr>
                  <td class="border border-gray-300 px-2 py-1">{{ $product->name }}</td>
                  <td class="border border-gray-300 px-2 py-1">{{ $product->total_sold }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- Activities Chart -->
        <div class="bg-white/90 backdrop-blur-sm shadow-xl rounded-2xl p-4">
          <h4 class="text-lg font-semibold mb-3">Recent Admin Activities</h4>
          <canvas id="activitiesChart" width="400" height="150" onclick="toggleTable('activitiesTable')" class="cursor-pointer"></canvas>
          <table id="activitiesTable" class="hidden mt-3 w-full table-auto border-collapse border border-gray-300 text-sm">
            <thead>
              <tr class="bg-gray-100">
                <th class="border border-gray-300 px-2 py-1">Action</th>
                <th class="border border-gray-300 px-2 py-1">Details</th>
                <th class="border border-gray-300 px-2 py-1">Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach($recentAdminActivities as $activity)
                <tr>
                  <td class="border border-gray-300 px-2 py-1">{{ $activity['type'] }}</td>
                  <td class="border border-gray-300 px-2 py-1">{{ $activity['details'] }}</td>
                  <td class="border border-gray-300 px-2 py-1">{{ $activity['date']->format('Y-m-d H:i') }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      </div>
    </section>

    <!-- Recent Activity -->
    <section>
      <h3 class="text-2xl font-bold text-gray-800 mb-5">Recent Activities</h3>
      <div class="bg-white/90 backdrop-blur-sm shadow-xl rounded-2xl p-6 hover:shadow-2xl transition duration-300">
        <ul class="divide-y divide-gray-200">
          @forelse($recentAdminActivities as $activity)
            <li class="py-4 flex justify-between items-center hover:bg-amber-50 px-3 rounded-lg transition">
              <span class="text-gray-700">{{ $activity['type'] }}: <b>{{ $activity['details'] }}</b></span>
              <div class="flex items-center space-x-3">
                <span class="text-sm text-gray-500">{{ $activity['date']->diffForHumans() }}</span>
                <a href="{{ $activity['link'] }}" class="px-3 py-1 bg-amber-600 text-white text-sm rounded-lg hover:bg-amber-700 transition">Show Details</a>
              </div>
            </li>
          @empty
            <li class="py-4 text-center text-gray-500">No recent activities.</li>
          @endforelse
        </ul>
      </div>
    </section>

  </main>
</body>
</html>

<script>
// Toggle table visibility on chart click
function toggleTable(tableId) {
  const table = document.getElementById(tableId);
  table.classList.toggle('hidden');
}

// Marketable Products Chart
const marketableCtx = document.getElementById('marketableChart').getContext('2d');
new Chart(marketableCtx, {
  type: 'bar',
  data: {
    labels: @json($marketableProducts->pluck('name')),
    datasets: [{
      label: 'Total Sold',
      data: @json($marketableProducts->pluck('total_sold')),
      backgroundColor: 'rgba(255, 193, 7, 0.6)',
      borderColor: 'rgba(255, 193, 7, 1)',
      borderWidth: 1
    }]
  },
  options: { responsive: true, scales: { y: { beginAtZero: true } } }
});

// Non-Marketable Products Chart
const nonMarketableCtx = document.getElementById('nonMarketableChart').getContext('2d');
new Chart(nonMarketableCtx, {
  type: 'bar',
  data: {
    labels: @json($nonMarketableProducts->pluck('name')),
    datasets: [{
      label: 'Total Sold',
      data: @json($nonMarketableProducts->pluck('total_sold')),
      backgroundColor: 'rgba(220, 53, 69, 0.6)',
      borderColor: 'rgba(220, 53, 69, 1)',
      borderWidth: 1
    }]
  },
  options: { responsive: true, scales: { y: { beginAtZero: true } } }
});

// Activities Chart (admin actions)
const activitiesCtx = document.getElementById('activitiesChart').getContext('2d');
new Chart(activitiesCtx, {
  type: 'bar',
  data: {
    labels: @json(array_keys($activityCounts)),
    datasets: [{
      label: 'Recent Count',
      data: @json(array_values($activityCounts)),
      backgroundColor: ['rgba(40, 167, 69, 0.6)', 'rgba(0, 123, 255, 0.6)', 'rgba(255, 193, 7, 0.6)'],
      borderColor: ['rgba(40, 167, 69, 1)', 'rgba(0, 123, 255, 1)', 'rgba(255, 193, 7, 1)'],
      borderWidth: 1
    }]
  },
  options: { responsive: true, scales: { y: { beginAtZero: true } } }
});
</script>
