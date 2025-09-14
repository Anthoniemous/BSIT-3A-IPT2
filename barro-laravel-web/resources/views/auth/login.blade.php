<x-guest-layout>
    <div class="w-full max-w-md px-8 py-6 bg-white/95 rounded-2xl shadow-2xl">
            
        <!-- Header -->
        <div class="mb-6 text-center">
            <h1 class="text-3xl font-extrabold text-blue-900">{{ __('Welcome Back') }}</h1>
            <p class="text-sm text-gray-600 mt-1">{{ __('Please log in to your account') }}</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-blue-900 font-semibold" />
                <x-text-input id="email" 
                    class="block mt-1 w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-200" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autofocus 
                    autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="text-blue-900 font-semibold" />
                <x-text-input id="password" 
                    class="block mt-1 w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-200"
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Remember Me + Forgot -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="flex items-center text-sm text-gray-600">
                    <input id="remember_me" 
                        type="checkbox" 
                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" 
                        name="remember">
                    <span class="ml-2">{{ __('Remember me') }}</span>
                </label>
                
                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-500 hover:text-blue-600 font-medium transition" 
                       href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <!-- Submit Button -->
            <div>
                <x-primary-button class="w-full justify-center py-2 text-base bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow-lg transition duration-200 ease-in-out hover:scale-[1.02]">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>

        <!-- Footer Links -->
        <div class="mt-6 text-center text-sm text-gray-600">
            {{ __("Don't have an account?") }}
            <a href="{{ route('register') }}" 
               class="text-blue-500 hover:text-blue-600 font-medium transition">
                {{ __('Sign up') }}
            </a>

            <!-- Divider -->
            <div class="flex items-center my-4">
                <hr class="flex-grow border-gray-300">
                <span class="mx-2 text-gray-500 text-xs">OR</span>
                <hr class="flex-grow border-gray-300">
            </div>

            <!-- Google Login Button -->
            <a href="{{ url('/auth/google/redirect') }}" 
               class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-lg shadow-md transition">
                <svg class="w-5 h-5 mr-2" viewBox="0 0 533.5 544.3">
                    <path fill="#4285F4" d="M533.5 278.4c0-17.4-1.6-34-4.6-50.2H272.1v95.3h147.5c-6.3 33.9-25.4 62.6-54.1 81.8l87.2 67.8c51-47 80.8-116.3 80.8-194.7z"/>
                    <path fill="#34A853" d="M272.1 544.3c73.4 0 135-24.3 179.9-66.1l-87.2-67.8c-24.2 16.3-55.2 26-92.7 26-71 0-131.3-47.9-152.9-112.1l-90.2 69.6c43.9 87.3 134 150.4 243.1 150.4z"/>
                    <path fill="#FBBC05" d="M119.2 324.2c-10.3-30-10.3-62.5 0-92.5l-90.2-69.6c-39.4 77.6-39.4 168.2 0 245.8l90.2-69.7z"/>
                    <path fill="#EA4335" d="M272.1 107.7c38.9-.6 75.7 13.7 103.8 39.9l77.5-77.5C406.9 24.2 344.9 0 272.1 0 163 0 72.9 63.1 29 150.4l90.2 69.6c21.6-64.2 81.9-112.3 152.9-112.3z"/>
                </svg>
                Login with Google
            </a>
        </div>

    </div>
</x-guest-layout>
