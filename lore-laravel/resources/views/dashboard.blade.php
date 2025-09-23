<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">

                <!-- Welcome Message -->
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-6">
                    Welcome back, {{ Auth::user()->name }} 👋
                </h3>

                <!-- Modern Grid Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-6">

                    <!-- Profile -->
                    <a href="{{ route('profile.edit') }}"
                       class="p-6 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl shadow-lg hover:scale-105 transition transform duration-200">
                        <div class="flex flex-col items-center">
                            <div class="text-4xl mb-3">👤</div>
                            <h4 class="text-lg font-semibold">Profile</h4>
                            <p class="text-sm opacity-80">Manage your account</p>
                        </div>
                    </a>

                    <!-- Settings -->
                    <a href="#"
                       class="p-6 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl shadow-lg hover:scale-105 transition transform duration-200">
                        <div class="flex flex-col items-center">
                            <div class="text-4xl mb-3">⚙️</div>
                            <h4 class="text-lg font-semibold">Settings</h4>
                            <p class="text-sm opacity-80">Customize preferences</p>
                        </div>
                    </a>

                    <!-- Files -->
                    <a href="#"
                       class="p-6 bg-gradient-to-r from-yellow-500 to-yellow-600 text-white rounded-xl shadow-lg hover:scale-105 transition transform duration-200">
                        <div class="flex flex-col items-center">
                            <div class="text-4xl mb-3">📂</div>
                            <h4 class="text-lg font-semibold">My Files</h4>
                            <p class="text-sm opacity-80">Access your documents</p>
                        </div>
                    </a>

                    <!-- Notifications -->
                    <a href="#"
                       class="p-6 bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-xl shadow-lg hover:scale-105 transition transform duration-200">
                        <div class="flex flex-col items-center">
                            <div class="text-4xl mb-3">🔔</div>
                            <h4 class="text-lg font-semibold">Notifications</h4>
                            <p class="text-sm opacity-80">Stay updated</p>
                        </div>
                    </a>

                    <!-- Reports -->
                    <a href="#"
                       class="p-6 bg-gradient-to-r from-pink-500 to-pink-600 text-white rounded-xl shadow-lg hover:scale-105 transition transform duration-200">
                        <div class="flex flex-col items-center">
                            <div class="text-4xl mb-3">📊</div>
                            <h4 class="text-lg font-semibold">Reports</h4>
                            <p class="text-sm opacity-80">View your stats</p>
                        </div>
                    </a>
                </div>

                <!-- Back + Logout -->
                <div class="flex space-x-4">
                    <a href="{{ url()->previous() }}" 
                       class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
                        ⬅ Back
                    </a>

                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                       class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                        🚪 Logout
                    </a>
                </div>

                <!-- Hidden logout form -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
