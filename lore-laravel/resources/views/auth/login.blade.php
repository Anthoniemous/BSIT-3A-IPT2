<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>
        <div class="flex items-center justify-center mt-4">
            <a href="{{ route('redirect.google') }}"
            class="w-full flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-lg shadow-sm text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition ease-in-out duration-150">

                <!-- Google Icon -->
                <svg class="w-5 h-5 mr-2" viewBox="0 0 533.5 544.3">
                    <path fill="#4285f4" d="M533.5 278.4c0-17.4-1.6-34.1-4.7-50.4H272v95.3h146.9c-6.4 34.7-25.7 64.2-54.7 83.9v69h88.4c51.6-47.5 80.9-117.6 80.9-197.8z"/>
                    <path fill="#34a853" d="M272 544.3c73.7 0 135.5-24.3 180.6-65.8l-88.4-69c-24.5 16.5-55.8 26.3-92.2 26.3-70.9 0-131-47.9-152.4-112.1h-91.3v70.5c45.3 89.2 137.4 150.1 243.7 150.1z"/>
                    <path fill="#fbbc04" d="M119.6 323.7c-10.8-31.6-10.8-65.5 0-97.1V156.1h-91.3c-37.1 73.8-37.1 161.8 0 235.6l91.3-68z"/>
                    <path fill="#ea4335" d="M272 107.7c38.7 0 73.4 13.3 100.7 39.4l75.4-75.4C407.6 24.2 345.7 0 272 0 165.7 0 73.6 60.9 28.3 150.1l91.3 70c21.3-64.2 81.4-112.4 152.4-112.4z"/>
                </svg>

                <span>Login with Google</span>
            </a>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

    </form>
</x-guest-layout>
