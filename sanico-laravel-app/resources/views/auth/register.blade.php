<x-guest-layout>
    <div class="flex items-center justify-center bg-gradient-to-r from-purple-600 to-blue-500 rounded-2xl shadow-2xl p-8 space-y-8">
        <!-- Register Card -->
        <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8 space-y-8">
            
            <!-- Heading -->
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-900">Create an Account</h1>
                <p class="mt-2 text-gray-600">Join us and get started today</p>
            </div>

            <!-- Register Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-gray-700 font-medium" />
                    <x-text-input id="name"
                                  type="text"
                                  name="name"
                                  :value="old('name')"
                                  required autofocus autocomplete="name"
                                  class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-medium" />
                    <x-text-input id="email"
                                  type="email"
                                  name="email"
                                  :value="old('email')"
                                  required autocomplete="username"
                                  class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium" />
                    <x-text-input id="password"
                                  type="password"
                                  name="password"
                                  required autocomplete="new-password"
                                  class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 font-medium" />
                    <x-text-input id="password_confirmation"
                                  type="password"
                                  name="password_confirmation"
                                  required autocomplete="new-password"
                                  class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between">
                    <a href="{{ route('login') }}"
                       class="text-sm font-medium text-purple-600 hover:text-purple-800 transition">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="bg-purple-600 hover:bg-purple-700 text-white rounded-lg py-2 px-4 shadow-md transition">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
