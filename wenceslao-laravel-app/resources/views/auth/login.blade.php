<x-guest-layout>
    <div class="w-full max-w-md bg-rose-50 rounded-lg shadow-lg p-8">
            
        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-rose-700" :status="session('status')" />

        <h2 class="text-2xl font-bold text-center text-rose-800 mb-6">
            {{ __('Welcome Back') }}
        </h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-rose-700" />
                <x-text-input 
                    id="email" 
                    class="block mt-1 w-full rounded-lg bg-rose-50 text-gray-900 border border-rose-300 focus:border-rose-500 focus:ring-rose-500" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autofocus 
                    autocomplete="username" 
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-rose-700" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-rose-700" />
                <x-text-input 
                    id="password" 
                    class="block mt-1 w-full rounded-lg bg-rose-50 text-gray-900 border border-rose-300 focus:border-rose-500 focus:ring-rose-500" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="current-password" 
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-rose-700" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input 
                        id="remember_me" 
                        type="checkbox" 
                        class="rounded border-rose-400 bg-rose-50 text-rose-700 focus:ring-rose-500" 
                        name="remember"
                    >
                    <span class="ms-2 text-sm text-gray-700">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-rose-700 hover:text-rose-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3 bg-rose-600 hover:bg-rose-700 text-white px-4 py-2 rounded-lg shadow-md transition duration-200">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>

        <!-- Footer Links -->
        <div class="mt-6 text-center text-sm text-gray-700">
            {{ __("Don't have an account?") }}
            <a href="{{ route('register') }}" 
               class="text-rose-700 hover:text-rose-900 font-medium transition">
                {{ __('Sign up') }}
            </a>

            <!-- Divider -->
            <div class="flex items-center my-4">
                <hr class="flex-grow border-rose-300">
                <span class="mx-2 text-rose-600 text-xs">OR</span>
                <hr class="flex-grow border-rose-300">
            </div>

            <!-- Google Login Button -->
            <a href="{{ route('google-auth') }}" 
               class="w-full inline-flex items-center justify-center px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white font-medium rounded-lg shadow-md transition">
                <svg class="w-5 h-5 mr-2" viewBox="0 0 533.5 544.3">
                    <path fill="#4285F4" d="M533.5 278.4c0-17.4-1.6-34-4.6-50.2H272.1v95.3h147.5c-6.3 33.9-25.4 62.6-54.1 81.8l87.2 67.8c51-47 80.8-116.3 80.8-194.7z"/>
                    <path fill="#34A853" d="M272.1 544.3c73.4 0 135-24.3 179.9-66.1l-87.2-67.8c-24.2 16.3-55.2 26-92.7 26-71 0-131.3-47.9-152.9-112.1l-90.2 69.6c43.9 87.3 134 150.4 243.1 150.4z"/>
                    <path fill="#FBBC05" d="M119.2 324.2c-10.3-30-10.3-62.5 0-92.5l-90.2-69.6c-39.4 77.6-39.4 168.2 0 245.8l90.2-69.7z"/>
                    <path fill="#EA4335" d="M272.1 107.7c38.9-.6 75.7 13.7 103.8 39.9l77.5-77.5C406.9 24.2 344.9 0 272.1 0 163 0 72.9 63.1 29 150.4l90.2 69.6c21.6-64.2 81.9-112.3 152.9-112.3z"/>
                </svg>
                {{ __('Login with Google') }}
            </a>
        </div>
    </div>
</x-guest-layout>
