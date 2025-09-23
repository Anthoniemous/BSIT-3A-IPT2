<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-900 via-blue-700 to-blue-500">
        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl">
            <!-- Logo -->
            <!--<div class="flex justify-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-blue-900" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 0L24 7v10l-12 7-12-7V7z"/>
                </svg>
            </div>-->

            <!-- Title -->
              <h1 class="text-4xl font-extrabold text-center text-blue-900 mb-4">Aurora</h1>
            <p class="text-2xl font-bold text-center text-blue-900 mb-6">Create Your Account ✨</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-blue-900" />
                    <x-text-input id="name"
                        class="block mt-1 w-full border-gray-300 rounded-lg focus:border-blue-700 focus:ring-blue-700"
                        type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-blue-700" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" class="text-blue-900" />
                    <x-text-input id="email"
                        class="block mt-1 w-full border-gray-300 rounded-lg focus:border-blue-700 focus:ring-blue-700"
                        type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-blue-700" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-blue-900" />
                    <x-text-input id="password"
                        class="block mt-1 w-full border-gray-300 rounded-lg focus:border-blue-700 focus:ring-blue-700"
                        type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-blue-700" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-blue-900" />
                    <x-text-input id="password_confirmation"
                        class="block mt-1 w-full border-gray-300 rounded-lg focus:border-blue-700 focus:ring-blue-700"
                        type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-blue-700" />
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between mt-6">
                    <!-- Already Registered Link -->
                    <a class="underline text-sm text-blue-700 hover:text-blue-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-700"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <!-- Register Button -->
                    <x-primary-button class="ms-4 bg-blue-900 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold shadow-lg transition-all duration-300">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
