<x-app-layout>
    <div class="min-h-screen flex bg-gray-50 dark:bg-zinc-950 text-gray-800 dark:text-gray-200">
        <!-- Sidebar -->
        <aside class="w-64 bg-white dark:bg-zinc-900 border-r border-gray-200 dark:border-zinc-800 p-6 hidden md:block">
            <div class="flex items-center gap-2 mb-10">
                <svg class="h-8 w-8 text-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 62 65" fill="currentColor">
                    <path d="M61.8548 14.6253C61.8778 14.7102...Z"/>
                </svg>
                <span class="font-semibold text-lg">Admin Panel</span>
            </div>

            <nav class="space-y-3">
                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-[#FF2D20]/10 hover:text-[#FF2D20] transition">
                    <i class="fa-solid fa-chart-line"></i> Dashboard
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-[#FF2D20]/10 hover:text-[#FF2D20] transition">
                    <i class="fa-solid fa-utensils"></i> Menu Items
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-[#FF2D20]/10 hover:text-[#FF2D20] transition">
                    <i class="fa-solid fa-cart-shopping"></i> Transactions
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-[#FF2D20]/10 hover:text-[#FF2D20] transition">
                    <i class="fa-solid fa-truck"></i> Shipments
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-[#FF2D20]/10 hover:text-[#FF2D20] transition">
                    <i class="fa-solid fa-user"></i> Users
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8 relative">
            <!-- Topbar -->
            <header class="flex items-center justify-between mb-10">
                <h1 class="text-2xl font-semibold">Dashboard</h1>
                <div class="flex items-center gap-4">
                    <button class="bg-[#FF2D20] text-white px-4 py-2 rounded-lg font-medium hover:bg-[#e5241a] transition">Add Menu Item</button>
                    <div class="w-10 h-10 rounded-full bg-gray-300 dark:bg-zinc-700 flex items-center justify-center font-bold">A</div>
                </div>
            </header>

            <!-- Stats Grid -->
            <section class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-xl bg-white dark:bg-zinc-900 p-6 shadow-md border border-gray-200 dark:border-zinc-800">
                    <h2 class="text-sm text-gray-500">Total Users</h2>
                    <p class="text-3xl font-semibold mt-2">1,245</p>
                </div>
                <div class="rounded-xl bg-white dark:bg-zinc-900 p-6 shadow-md border border-gray-200 dark:border-zinc-800">
                    <h2 class="text-sm text-gray-500">Total Orders</h2>
                    <p class="text-3xl font-semibold mt-2">320</p>
                </div>
                <div class="rounded-xl bg-white dark:bg-zinc-900 p-6 shadow-md border border-gray-200 dark:border-zinc-800">
                    <h2 class="text-sm text-gray-500">Revenue</h2>
                    <p class="text-3xl font-semibold mt-2">₱45,000</p>
                </div>
                <div class="rounded-xl bg-white dark:bg-zinc-900 p-6 shadow-md border border-gray-200 dark:border-zinc-800">
                    <h2 class="text-sm text-gray-500">Pending Shipments</h2>
                    <p class="text-3xl font-semibold mt-2">8</p>
                </div>
            </section>

            <!-- Recent Transactions -->
            <section class="mt-10 bg-white dark:bg-zinc-900 rounded-xl shadow-md border border-gray-200 dark:border-zinc-800 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold">Recent Transactions</h2>
                    <a href="#" class="text-[#FF2D20] text-sm font-medium hover:underline">View All</a>
                </div>

                <table class="w-full text-left text-sm">
                    <thead class="border-b border-gray-200 dark:border-zinc-700 text-gray-600 dark:text-gray-400">
                        <tr>
                            <th class="py-2">User</th>
                            <th class="py-2">Menu Item</th>
                            <th class="py-2">Amount</th>
                            <th class="py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 dark:text-gray-300">
                        <tr>
                            <td class="py-3">John Doe</td>
                            <td class="py-3">Cappuccino</td>
                            <td class="py-3">₱150</td>
                            <td class="py-3"><span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">Completed</span></td>
                        </tr>
                        <tr>
                            <td class="py-3">Jane Smith</td>
                            <td class="py-3">Latte</td>
                            <td class="py-3">₱120</td>
                            <td class="py-3"><span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs">Pending</span></td>
                        </tr>
                        <tr>
                            <td class="py-3">Mark Santos</td>
                            <td class="py-3">Mocha</td>
                            <td class="py-3">₱160</td>
                            <td class="py-3"><span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs">Cancelled</span></td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</x-app-layout>
