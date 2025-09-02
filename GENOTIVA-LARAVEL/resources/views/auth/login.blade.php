<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-pink-200 via-purple-200 to-indigo-200">
        <div class="w-full max-w-md p-8 bg-white/70 backdrop-blur-lg rounded-3xl shadow-lg">
            
            <h2 class="text-3xl font-bold text-center text-pink-600 mb-6">Welcome Back!</h2>
            <p class="text-center text-gray-600 mb-8">Login to access your account</p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="!text-gray-600 font-medium" />
                    <x-text-input id="email" class="block mt-1 w-full rounded-xl border border-pink-300 focus:ring-2 focus:ring-pink-400 focus:border-pink-400 shadow-sm p-2" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" class="!text-gray-600 font-medium" />
                    <x-text-input id="password" 
                        class="block mt-1 w-full rounded-xl border border-pink-300 focus:ring-2 focus:ring-pink-400 focus:border-pink-400 shadow-sm p-2" 
                        type="password" 
                        name="password" 
                        required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-6">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-pink-500 shadow-sm focus:ring-pink-400">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Submit & Forgot Password -->
                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-pink-600 hover:text-pink-800 underline" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ml-3 bg-pink-500 hover:bg-pink-600 active:bg-pink-700 focus:ring-pink-400 rounded-xl px-6 py-2 shadow-md text-white font-semibold transition-all duration-200">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
