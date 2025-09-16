<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-purple-900 via-purple-700 to-purple-500">
        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl">
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-purple-700" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 0L24 7v10l-12 7-12-7V7z"/>
                </svg>
            </div>

            <!-- Title -->
            <h1 class="text-2xl font-bold text-center text-purple-900 mb-6">Create Your Account ✨</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-purple-900" />
                    <x-text-input id="name"
                        class="block mt-1 w-full border-gray-300 rounded-lg focus:border-purple-700 focus:ring-purple-700"
                        type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-purple-700" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" class="text-purple-900" />
                    <x-text-input id="email"
                        class="block mt-1 w-full border-gray-300 rounded-lg focus:border-purple-700 focus:ring-purple-700"
                        type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-purple-700" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-purple-900" />
                    <x-text-input id="password"
                        class="block mt-1 w-full border-gray-300 rounded-lg focus:border-purple-700 focus:ring-purple-700"
                        type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-purple-700" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-purple-900" />
                    <x-text-input id="password_confirmation"
                        class="block mt-1 w-full border-gray-300 rounded-lg focus:border-purple-700 focus:ring-purple-700"
                        type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-purple-700" />
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between mt-6">
                    <a class="underline text-sm text-purple-700 hover:text-purple-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-700"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ms-4 bg-purple-700 hover:bg-purple-900 text-white px-6 py-2 rounded-lg">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
