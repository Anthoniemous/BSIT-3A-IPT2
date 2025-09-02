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
                    <x-input-label for="email" :value="__('Email')" class="text-gray-800 font-semibold"/>
                    <x-text-input id="email" class="block mt-1 w-full border border-yellow-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 transition duration-300" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-800 font-semibold"/>
                    <x-text-input id="password" class="block mt-1 w-full border border-yellow-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 transition duration-300"
                                  type="password"
                                  name="password"
                                  required autocomplete="current-password" />
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
        </div>
    </div>
</x-guest-layout>
