<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-yellow-100 via-yellow-200 to-yellow-100">
        <div class="w-full max-w-md p-10 bg-white/90 backdrop-blur-lg rounded-2xl shadow-xl border border-yellow-300">
            <h2 class="text-3xl font-bold text-center text-yellow-800 mb-6">Welcome</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="text-yellow-800 font-bold"/>
                    <x-text-input id="email" 
                        class="block mt-1 w-full bg-white border border-yellow-400 rounded-lg px-3 py-2 
                            text-gray-800 placeholder-gray-400 
                            focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition duration-300" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autofocus 
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" class="text-yellow-800 font-bold"/>
                    <x-text-input id="password" 
                        class="block mt-1 w-full bg-white border border-yellow-400 rounded-lg px-3 py-2 
                            text-gray-800 placeholder-gray-400 
                            focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition duration-300" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>



                <!-- Remember Password -->
                <div class="flex items-center mb-4">
                    <input id="remember_password" type="checkbox" class="rounded border-yellow-300 text-yellow-600 focus:ring-yellow-500" name="remember">
                    <label for="remember_password" class="ml-2 text-gray-700 dark:text-gray-500 text-sm">{{ __('Remember password') }}</label>
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-between">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-yellow-700 hover:text-yellow-900 underline mb-2 sm:mb-0" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ml-0 sm:ml-3 w-full sm:w-auto bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Divider -->
            <div class="flex items-center my-4">
                <hr class="flex-grow border-yellow-400">
                <span class="mx-2 text-yellow-700 text-xs">OR</span>
                <hr class="flex-grow border-yellow-400">
            </div>

            <!-- Google Login Button -->
            <a href="{{ route('google.redirect') }}" 
            class="w-full inline-flex items-center justify-center px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white font-medium rounded-lg shadow-md transition">
                <svg class="w-5 h-5 mr-2" viewBox="0 0 533.5 544.3">
                    <path fill="#d4a373" d="M533.5 278.4c0-17.4-1.6-34-4.6-50.2H272.1v95.3h147.5c-6.3 33.9-25.4 62.6-54.1 81.8l87.2 67.8c51-47 80.8-116.3 80.8-194.7z"/>
                    <path fill="#facc15" d="M272.1 544.3c73.4 0 135-24.3 179.9-66.1l-87.2-67.8c-24.2 16.3-55.2 26-92.7 26-71 0-131.3-47.9-152.9-112.1l-90.2 69.6c43.9 87.3 134 150.4 243.1 150.4z"/>
                    <path fill="#fde047" d="M119.2 324.2c-10.3-30-10.3-62.5 0-92.5l-90.2-69.6c-39.4 77.6-39.4 168.2 0 245.8l90.2-69.7z"/>
                    <path fill="#facc15" d="M272.1 107.7c38.9-.6 75.7 13.7 103.8 39.9l77.5-77.5C406.9 24.2 344.9 0 272.1 0 163 0 72.9 63.1 29 150.4l90.2 69.6c21.6-64.2 81.9-112.3 152.9-112.3z"/>
                </svg>
                Continue with Google
            </a>

            </div>

        </div>
    </div>
</x-guest-layout>
