<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email"
                class="w-full px-4 py-2 mt-2 rounded-md bg-white/90 text-gray-900 
                       focus:outline-none focus:ring-2 focus:ring-yellow-400"
                type="email" name="email" :value="old('email')" required autofocus
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password"
                class="w-full px-4 py-2 mt-2 rounded-md bg-white/90 text-gray-900 
                       focus:outline-none focus:ring-2 focus:ring-yellow-400"
                type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-yellow-600 shadow-sm 
                           focus:ring-yellow-400" name="remember">
                <span class="ms-2 text-sm text-gray-100">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between mt-6">
            <!-- Google Login -->
            <a href="{{ route('auth.google') }}"
                class="inline-block px-6 py-2 text-white bg-red-600 rounded hover:bg-red-700">
                {{ __('Google login') }}
            </a>

            <!-- Forgot Password -->
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-200 hover:text-yellow-400"
                   href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <!-- Login Button -->
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
