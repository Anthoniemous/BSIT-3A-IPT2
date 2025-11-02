<x-app-layout>
    <!-- Header -->
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome back, ') . Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            <!-- Hero Section -->
            <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white p-10 rounded-2xl shadow-lg flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                    <h1 class="text-4xl font-bold">Hello, {{ Auth::user()->name }} 👋</h1>
                    <p class="mt-3 text-lg text-gray-100">
                        Welcome to your homepage! Here’s a quick overview of what’s happening today.
                    </p>
                    <a href="{{ route('dashboard') }}"
                       class="inline-block mt-6 px-6 py-3 bg-white text-indigo-600 font-semibold rounded-lg shadow hover:bg-gray-100 transition">
                        Explore Dashboard
                    </a>
                </div>
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                     alt="User Illustration"
                     class="w-40 md:w-56 drop-shadow-lg">
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">📢 Announcements</h3>
                    <p class="mt-3 text-gray-600 dark:text-gray-300">No new announcements today.</p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">✅ Tasks</h3>
                    <p class="mt-3 text-gray-600 dark:text-gray-300">
                        You have <span class="font-bold text-green-600">2</span> tasks pending.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">🔔 Notifications</h3>
                    <p class="mt-3 text-gray-600 dark:text-gray-300">
                        You have <span class="font-bold text-yellow-500">3</span> unread messages.
                    </p>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">📊 Recent Activity</h3>
                    <a href="#"
                       class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">
                        View all
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700 text-left text-sm font-semibold">
                                <th class="p-3 text-gray-700 dark:text-gray-300">Date</th>
                                <th class="p-3 text-gray-700 dark:text-gray-300">Activity</th>
                                <th class="p-3 text-gray-700 dark:text-gray-300">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="p-3 text-gray-600 dark:text-gray-300">Sept 20, 2025</td>
                                <td class="p-3 text-gray-600 dark:text-gray-300">Logged in</td>
                                <td class="p-3 text-green-600 font-semibold">✔ Success</td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="p-3 text-gray-600 dark:text-gray-300">Sept 19, 2025</td>
                                <td class="p-3 text-gray-600 dark:text-gray-300">Updated Profile</td>
                                <td class="p-3 text-yellow-500 font-semibold">⚠ Pending</td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="p-3 text-gray-600 dark:text-gray-300">Sept 18, 2025</td>
                                <td class="p-3 text-gray-600 dark:text-gray-300">Completed Task</td>
                                <td class="p-3 text-blue-500 font-semibold">✔ Done</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
