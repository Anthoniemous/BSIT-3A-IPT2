<x-guest-layout>
    <div class="w-full max-w-md p-8 bg-white/80 backdrop-blur-md rounded-3xl shadow-2xl">
        
        <h2 class="text-3xl font-bold text-center text-pink-600 mb-3">Create Your Account</h2>
        <p class="text-center text-gray-600 mb-8">Sign up to get started</p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <x-input-label for="name" :value="__('Name')" class="!text-gray-600 font-medium" />
                <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                    class="block mt-1 w-full rounded-xl border border-pink-300 focus:ring-2 focus:ring-pink-400 focus:border-pink-400 shadow-sm p-2 bg-white" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="!text-gray-600 font-medium" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                    class="block mt-1 w-full rounded-xl border border-pink-300 focus:ring-2 focus:ring-pink-400 focus:border-pink-400 shadow-sm p-2 bg-white" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" class="!text-gray-600 font-medium" />
                <x-text-input id="password" type="password" name="password" required autocomplete="new-password"
                    class="block mt-1 w-full rounded-xl border border-pink-300 focus:ring-2 focus:ring-pink-400 focus:border-pink-400 shadow-sm p-2 bg-white" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="!text-gray-600 font-medium" />
                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="block mt-1 w-full rounded-xl border border-pink-300 focus:ring-2 focus:ring-pink-400 focus:border-pink-400 shadow-sm p-2 bg-white" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Register Button -->
            <div class="flex items-center justify-between">
                <a class="text-sm text-pink-600 hover:text-pink-800 underline" href="{{ route('login') }}">
                    Already registered?
                </a>

                <x-primary-button class="ml-3 bg-pink-500 hover:bg-pink-600 active:bg-pink-700 focus:ring-pink-400 rounded-xl px-6 py-2 shadow-md text-white font-semibold transition-all duration-200">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
