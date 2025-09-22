<x-app-layout>
    {{-- Optional page header slot --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Home') }}
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">
            Welcome back, {{ $user->name }}!
        </h1>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Profile Card -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Profile</h2>
                <p class="text-gray-600 dark:text-gray-300 mt-2">
                    Update your personal info and password.
                </p>
                <a href="{{ route('profile.edit') }}"
                   class="text-blue-500 hover:underline mt-3 inline-block">
                    Edit Profile
                </a>
            </div>

            <!-- Dashboard Card -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Dashboard</h2>
                <p class="text-gray-600 dark:text-gray-300 mt-2">
                    View your main dashboard page.
                </p>
                <a href="{{ url('/dashboard') }}"
                   class="text-blue-500 hover:underline mt-3 inline-block">
                    Go to Dashboard
                </a>
            </div>

            <!-- Placeholder Card -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Coming Soon</h2>
                <p class="text-gray-600 dark:text-gray-300 mt-2">
                    Add more features or links here later.
                </p>
                <a href="#"
                   class="text-blue-500 hover:underline mt-3 inline-block">
                    Learn More
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
