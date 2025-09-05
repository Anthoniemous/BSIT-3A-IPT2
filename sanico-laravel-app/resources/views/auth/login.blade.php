<x-guest-layout>
    <div class="flex items-center justify-center bg-gradient-to-r from-purple-600 to-blue-500 rounded-2xl shadow-2xl p-8 space-y-">
        <!-- Login Card -->
        <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8 space-y-8">
            
            <!-- Heading -->
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-900">Welcome Back</h1>
                <p class="mt-2 text-gray-600">Sign in to access your account</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-medium" />
                    <x-text-input id="email"
                                  type="email"
                                  name="email"
                                  :value="old('email')"
                                  required autofocus autocomplete="username"
                                  class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium" />
                    <x-text-input id="password"
                                  type="password"
                                  name="password"
                                  required autocomplete="current-password"
                                  class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center text-gray-600">
                        <input id="remember_me"
                               type="checkbox"
                               name="remember"
                               class="rounded border-gray-300 text-purple-600 shadow-sm focus:ring-purple-500">
                        <span class="ml-2 text-sm"> {{ __('Remember me') }} </span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-sm font-medium text-purple-600 hover:text-purple-800 transition">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <div>
                    <x-primary-button class="w-full bg-purple-600 hover:bg-purple-700 text-white rounded-lg py-3 px-4 text-lg font-semibold shadow-md transition">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Divider -->
            <div class="flex items-center justify-center">
                <span class="border-t border-gray-300 w-1/4"></span>
                <span class="px-4 text-gray-500 text-sm">or</span>
                <span class="border-t border-gray-300 w-1/4"></span>
            </div>

            <!-- Sign Up CTA -->
            <p class="text-center text-sm text-gray-600">
                Don’t have an account? 
                <a href="{{ route('register') }}" class="font-medium text-purple-600 hover:text-purple-800 transition">
                    Sign up
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>
