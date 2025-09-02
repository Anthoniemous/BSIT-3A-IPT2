<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-400 via-purple-400 to-pink-400">
        <div class="w-full max-w-md bg-white rounded-xl shadow-xl p-8">

            <!-- Title -->
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">
                Create an Account
            </h2>
            <p class="text-center text-gray-500 mb-6 text-sm">
                Join us today! It only takes a few steps.
            </p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Name')" class="text-indigo-600" />
                    <x-text-input id="name" class="block mt-1 w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-400"
                                  type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="text-indigo-600" />
                    <x-text-input id="email" class="block mt-1 w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-400"
                                  type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" class="text-indigo-600" />
                    <x-text-input id="password" class="block mt-1 w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-400"
                                  type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-indigo-600" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-400"
                                  type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between">
                    <a class="text-sm text-purple-600 hover:underline" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ml-3 px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-md transition">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
