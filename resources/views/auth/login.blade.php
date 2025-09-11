    <x-guest-layout>
        <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-400 via-purple-400 to-pink-400">
            <div class="w-full max-w-md bg-white rounded-xl shadow-xl p-8">
                
                <!-- Title -->
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">
                    Welcome Back
                </h2>
                <p class="text-center text-gray-500 mb-6 text-sm">
                    Please log in to continue
                </p>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Email')" class="text-indigo-600" />
                        <x-text-input id="email"
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-400"
                            type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <x-input-label for="password" :value="__('Password')" class="text-indigo-600" />
                        <x-text-input id="password"
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-400"
                            type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center mb-4">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 focus:ring-purple-500"
                            name="remember">
                        <label for="remember_me" class="ml-2 text-sm text-gray-700">
                            {{ __('Remember me') }}
                        </label>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-between">
                        @if (Route::has('password.request'))
                            <a class="text-sm text-purple-600 hover:underline" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-primary-button class="ml-3 px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-md transition">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>


                <!-- Divider -->
        <div class="flex items-center my-6">
            <hr class="flex-grow border-gray-300">
            <span class="px-3 text-gray-500 text-sm">or</span>
            <hr class="flex-grow border-gray-300">
        </div>

                    <!-- Continue with Google -->
        <a href="{{ route('google-auth') }}"
            class="flex items-center justify-center w-full py-2.5 bg-white border border-gray-300 rounded-lg shadow hover:shadow-md transition duration-200">
            <img src="https://www.svgrepo.com/show/355037/google.svg" 
                 alt="Google" 
                 class="w-5 h-5 mr-2">
        <span class="text-gray-700 text-sm font-medium">Continue with Google</span>
            </a>
            
            </div>
        </div>
    </x-guest-layout>
