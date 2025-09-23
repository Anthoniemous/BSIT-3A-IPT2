<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-900 via-blue-700 to-blue-500">
        <div class="w-full max-w-md bg-white p-10 rounded-3xl shadow-2xl">
            
            <!-- Shop Name -->
            <h1 class="text-4xl font-extrabold text-center text-blue-900 mb-4">Aurora</h1>
            <p class="text-center text-blue-700 mb-6">Welcome back! Please login to your account ✨</p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-blue-900" />
                    <x-text-input id="email"
                        class="block mt-1 w-full border-gray-300 rounded-xl focus:border-blue-700 focus:ring-blue-700 shadow-sm"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-blue-700" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-blue-900" />
                    <x-text-input id="password"
                        class="block mt-1 w-full border-gray-300 rounded-xl focus:border-blue-700 focus:ring-blue-700 shadow-sm"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-blue-700" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-blue-700 shadow-sm focus:ring-blue-700"
                            name="remember">
                        <span class="ms-2 text-sm text-blue-900">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Actions -->
                <div class="flex justify-start mt-6">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-blue-700 hover:text-blue-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 me-3"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <!-- Login Button -->
                    <x-primary-button class="bg-blue-900 hover:bg-blue-700 text-white px-6 py-2 rounded-xl font-semibold shadow-lg transition-all duration-300">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Google Login Button -->
            <div class="mt-8">
                <a href="{{ route('google.redirect') }}" 
                   class="w-full inline-flex items-center justify-right px-4 py-3 bg-blue-900 text-white font-semibold hover:bg-blue-700 transition-all duration-300 rounded-2xl shadow-lg">
                    <svg class="w-5 h-5 mr-2" viewBox="0 0 533.5 544.3">
                        <path fill="#EA4335" d="M533.5 278.4c0-17.4-1.6-34-4.6-50.2H272.1v95.3h147.5c-6.3 33.9-25.4 62.6-54.1 81.8l87.2 67.8c51-47 80.8-116.3 80.8-194.7z"/>
                        <path fill="#34A853" d="M272.1 544.3c73.4 0 135-24.3 179.9-66.1l-87.2-67.8c-24.2 16.3-55.2 26-92.7 26-71 0-131.3-47.9-152.9-112.1l-90.2 69.6c43.9 87.3 134 150.4 243.1 150.4z"/>
                        <path fill="#FBBC05" d="M119.2 324.2c-10.3-30-10.3-62.5 0-92.5l-90.2-69.6c-39.4 77.6-39.4 168.2 0 245.8l90.2-69.7z"/>
                        <path fill="#4285F4" d="M272.1 107.7c38.9-.6 75.7 13.7 103.8 39.9l77.5-77.5C406.9 24.2 344.9 0 272.1 0 163 0 72.9 63.1 29 150.4l90.2 69.6c21.6-64.2 81.9-112.3 152.9-112.3z"/>
                    </svg>
                    Continue with Google
                </a>
            </div>

        </div>
    </div>
</x-guest-layout>
