<x-guest-layout>
    <!-- Login Card -->
    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Title -->
        <h1 class="text-3xl font-extrabold text-center text-rose-600" style="margin-bottom: -16px;">Login</h1>
        <p class="text-center text-gray-500 text-sm mb-6">Welcome back! Please sign in to continue.</p>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email"
                          class="block mt-1 w-full rounded-lg border-gray-300 focus:border-rose-400 focus:ring-rose-300"
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
                          class="block mt-1 w-full rounded-lg border-gray-300 focus:border-rose-400 focus:ring-rose-300"
                          type="password"
                          name="password"
                          required
                          autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember + Forgot -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me"
                       type="checkbox"
                       class="rounded border-gray-300 text-rose-500 shadow-sm focus:ring-rose-400"
                       name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-rose-500 hover:text-rose-700 transition font-medium"
                   href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <x-primary-button class="w-full justify-center bg-rose-500 hover:bg-rose-600 focus:ring-rose-400">
            {{ __('Log in') }}
        </x-primary-button>
    </form>

    <div class="flex items-center justify-center my-4">
        <span class="text-gray-400 text-sm">or</span>
    </div>

    <div>
        <a href="{{ route('google_auth') }}"
           class="flex items-center justify-center w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-100 focus:ring-2 focus:ring-rose-400 transition">
            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg"
                 alt="Google"
                 class="w-5 h-5 mr-2">
            Continue with Google
        </a>
    </div>
</x-guest-layout>
