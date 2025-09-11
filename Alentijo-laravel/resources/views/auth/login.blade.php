<x-guest-layout>
   
        <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-xl shadow-xl p-8 space-y-6">
            
            <!-- Title -->
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                    {{ __('Sign in to your account') }}
                </h2>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-300"/>
                    <x-text-input
                        id="email"
                        name="email"
                        type="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                        class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 shadow-sm"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300"/>
                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        required
                        autocomplete="current-password"
                        class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 shadow-sm"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Forgot Password -->
                <div class="flex items-center justify-between">
                    <div></div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline dark:text-indigo-400">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4">
                    <a href="{{ route('register') }}" 
                        class="w-1/2 inline-block text-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-md shadow-sm transition">
                        {{ __('Register') }}
                    </a>

                    <button type="submit"
                        class="w-1/2 inline-block px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-md shadow-sm transition">
                        {{ __('Log in') }}
                    </button>
                </div>

                <!-- Divider -->
                <div class="flex items-center justify-center">
                    <div class="border-t border-gray-300 dark:border-gray-700 w-full"></div>
                    <span class="mx-3 text-gray-500 dark:text-gray-400 text-sm">or</span>
                    <div class="border-t border-gray-300 dark:border-gray-700 w-full"></div>
                </div>

                <!-- Social Login -->
                <div>
                    <a type="button"
                        href="{{ route('google-auth') }}"
                        class="w-full flex items-center justify-center gap-2 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-600 transition">
                        <img src="{{ asset('img/google.png') }}" alt="Google" class="w-[40px]"  />
                        <span>Continue with Google</span>
                    </a>
                </div>
            </form>
        </div>
  
</x-guest-layout>
