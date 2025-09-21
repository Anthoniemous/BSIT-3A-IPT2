<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email"
                          class="block mt-1 w-full"
                          type="email"
                          name="email"
                          :value="old('email')"
                          required
                          autofocus
                          autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password"
                          class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required
                          autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me + Forgot Password -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center text-sm text-gray-600">
                <input id="remember_me"
                       type="checkbox"
                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                       name="remember">
                <span class="ms-2">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="text-sm text-indigo-600 hover:underline">
                   {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <!-- Primary Login Button -->
        <x-primary-button class="w-full justify-center">
            {{ __('Log in') }}
        </x-primary-button>

        <!-- Divider -->
        <div class="relative mt-8">
            <div class="absolute inset-0 flex items-center">
                <span class="w-full border-t border-gray-300"></span>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="bg-white px-2 text-gray-500">or continue with</span>
            </div>
        </div>

        <!-- Social Buttons -->
        <div class="grid grid-cols-2 gap-4 mt-6">
            {{-- Google --}}
            <a href="{{ route('google-auth') }}"
               class="flex items-center justify-center gap-2 rounded-md border border-gray-300
                      bg-white px-4 py-2 text-gray-700 shadow-sm hover:bg-gray-50
                      focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                <img src="{{ asset('img/google.png') }}"
                     alt="Google"
                     class="w-5 h-5">
                <span class="text-sm font-medium">Google</span>
            </a>

            {{-- Facebook --}}
            <a href="{{ route('google-auth') }}"
               class="flex items-center justify-center gap-2 rounded-md border border-gray-300
                      bg-white px-4 py-2 text-gray-700 shadow-sm hover:bg-gray-50
                      focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600">
                <img src="{{ asset('img/facebook.png') }}"
                     alt="Facebook"
                     class="w-5 h-5">
                <span class="text-sm font-medium">Facebook</span>
            </a>
        </div>
    </form>
</x-guest-layout>
