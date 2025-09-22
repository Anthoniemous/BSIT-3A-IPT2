<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Fullscreen gradient background -->
    <div class="relative min-h-screen w-full bg-gradient-to-br from-yellow-200 via-orange-100 to-red-200 flex items-center justify-center">
        
        <!-- Floating form container -->
        <div class="relative w-full max-w-md p-10 bg-white/70 backdrop-blur-lg rounded-3xl shadow-2xl z-10">
            <h2 class="text-3xl font-extrabold text-center text-red-600 mb-6">Welcome Back 🍕</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="!text-red-600" />
                    <x-text-input id="email" class="block mt-1 w-full border-red-300 focus:border-red-500 focus:ring focus:ring-red-200 rounded-lg" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-700" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" class="!text-red-600" />
                    <x-text-input id="password" class="block mt-1 w-full border-red-300 focus:border-red-500 focus:ring focus:ring-red-200 rounded-lg" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-700" />
                </div>

                <!-- Remember Me -->
                <div class="block mb-4">
                    <label for="remember_me" class="inline-flex items-center text-red-600">
                        <input id="remember_me" type="checkbox" class="rounded border-red-400 text-red-600 focus:ring-red-400" name="remember">
                        <span class="ml-2 text-sm">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Login Button -->
                <div class="flex items-center justify-end mb-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-red-700 hover:text-red-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-300" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ml-3 bg-gradient-to-r from-red-500 to-orange-400 hover:from-orange-400 hover:to-red-500 text-white">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Divider -->
            <div class="flex items-center my-6">
                <hr class="flex-grow border-red-300">
                <span class="px-3 text-red-600 text-sm font-medium">or</span>
                <hr class="flex-grow border-red-300">
            </div>

            <!-- Continue with Google -->
            <a href="{{ route('google-auth') }}"
               class="flex items-center justify-center w-full py-2.5 bg-white border border-red-300 rounded-lg shadow hover:shadow-md transition duration-200">
                <img src="https://www.svgrepo.com/show/355037/google.svg" 
                     alt="Google" 
                     class="w-5 h-5 mr-2">
                <span class="text-red-600 text-sm font-medium">Continue with Google</span>
            </a>

        </div>

        <!-- Optional: add subtle gradient overlay behind form -->
        <div class="absolute inset-0 bg-gradient-to-br from-yellow-200 via-orange-100 to-red-200 -z-10"></div>
    </div>
</x-guest-layout>
