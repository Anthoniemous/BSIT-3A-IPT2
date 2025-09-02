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
                        class="block mt-1 w-full border-gray-300 rounded-lg focus:border-orange-500 focus:ring focus:ring-orange-200" 
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
                        class="block mt-1 w-full border-gray-300 rounded-lg focus:border-orange-500 focus:ring focus:ring-orange-200"
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
                            class="rounded border-gray-300 text-orange-600 shadow-sm focus:ring-orange-500" 
                            name="remember">
                        <span class="ml-2">{{ __('Remember me') }}</span>
                    </label>
                    
                    @if (Route::has('password.request'))
                        <a class="text-sm text-orange-500 hover:text-orange-600 font-medium transition" 
                           href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div>
                    <x-primary-button class="w-full justify-center py-2 text-base bg-orange-500 hover:bg-orange-600 text-white rounded-lg shadow-lg transition duration-200 ease-in-out hover:scale-[1.02]">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Footer Links -->
            <div class="mt-6 text-center text-sm text-gray-600">
                {{ __("Don't have an account?") }}
                <a href="{{ route('register') }}" 
                   class="text-orange-500 hover:text-orange-600 font-medium transition">
                    {{ __('Sign up') }}
                </a>
            </div>
        </div>
</x-guest-layout>
