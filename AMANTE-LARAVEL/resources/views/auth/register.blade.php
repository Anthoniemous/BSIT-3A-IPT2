<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-400 via-purple-400 to-indigo-500">
        <div class="w-full max-w-md p-8 bg-white/80 backdrop-blur-lg rounded-xl shadow-lg">
            <h2 class="text-2xl font-bold text-center text-indigo-900 mb-6">Create Your Account</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="!text-indigo-800" />
                    <x-text-input id="name" class="block mt-1 w-full border-indigo-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-purple-700" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" class="!text-indigo-800" />
                    <x-text-input id="email" class="block mt-1 w-full border-indigo-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-purple-700" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="!text-indigo-800" />
                    <x-text-input id="password" class="block mt-1 w-full border-indigo-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-purple-700" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="!text-indigo-800" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full border-indigo-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-purple-700" />
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between mt-6">
                    <a class="underline text-sm text-purple-800 hover:text-purple-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-300" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ml-3 bg-gradient-to-r from-blue-500 to-purple-500 hover:from-purple-500 hover:to-blue-500">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
