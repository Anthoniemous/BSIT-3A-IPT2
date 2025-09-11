<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    <div class="bg-white py-8 px-6 shadow rounded-lg">
<!-- Social login -->
<div class="grid gap-3">
<a href="{{ route('google_auth') }}" class="w-full inline-flex justify-center items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium hover:bg-gray-50 focus:outline-none">
<!-- Google SVG -->
<svg class="w-5 h-5 mr-3" viewBox="0 0 533.5 544.3" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
<path d="M533.5 278.4c0-17.4-1.6-34.1-4.7-50.4H272v95.5h146.9c-6.3 34-25 62.8-53.6 82v68h86.6c50.6-46.6 81.6-115.3 81.6-195.1z"/>
<path d="M272 544.3c73.6 0 135.4-24.4 180.5-66.2l-86.6-68c-24.1 16.2-55 25.8-93.9 25.8-72 0-133-48.6-154.8-113.7h-90.8v71.5C72.6 480 165.1 544.3 272 544.3z"/>
<path d="M117.2 322.2c-10.8-32-10.8-66.6 0-98.6V152.1H26.4C-1.1 201.6-1.1 293 26.4 342.5l90.8-20.3z"/>
<path d="M272 107.7c39.9 0 75.7 13.7 103.9 40.6l77.8-77.8C404.7 24.1 344.1 0 272 0 165.1 0 72.6 64.3 26.4 152.1l90.8 71.5C139 156.3 200 107.7 272 107.7z"/>
</svg>
Continue with Google
</a>
</div>
</x-guest-layout>
