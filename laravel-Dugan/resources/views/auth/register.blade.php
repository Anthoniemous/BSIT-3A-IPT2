<x-guest-layout>
    <div class="max-w-md mx-auto bg-white shadow-xl rounded-xl px-8 py-10 sm:px-10 space-y-8">
        <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-800">{{ __('Create an Account') }}</h2>
            <p class="text-gray-500 text-sm">{{ __('Sign up to get started') }}</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <!-- Heroicon: User -->
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5.121 17.804A7.966 7.966 0 0112 15c2.042 0 3.897.764 5.293 2.021M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </span>

                <input id="name" name="name" type="text" :value="old('name')" required autofocus
                    placeholder=" "
                    class="peer pl-10 pt-4 pb-2 w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition" />
                
                <label for="name"
                    class="absolute left-10 top-2 text-sm text-gray-500 transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-sm peer-focus:text-indigo-500">
                    {{ __('Name') }}
                </label>

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <!-- Heroicon: Envelope -->
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </span>

                <input id="email" name="email" type="email" :value="old('email')" required
                    placeholder=" "
                    class="peer pl-10 pt-4 pb-2 w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition" />

                <label for="email"
                    class="absolute left-10 top-2 text-sm text-gray-500 transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-sm peer-focus:text-indigo-500">
                    {{ __('Email Address') }}
                </label>

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <!-- Heroicon: Lock Closed -->
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 11c1.105 0 2 .895 2 2v1H10v-1c0-1.105.895-2 2-2zM6 11V7a6 6 0 1112 0v4m-1 0H7a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2z"/>
                    </svg>
                </span>

                <input id="password" name="password" type="password" required autocomplete="new-password"
                    placeholder=" "
                    class="peer pl-10 pt-4 pb-2 w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition" />

                <label for="password"
                    class="absolute left-10 top-2 text-sm text-gray-500 transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-sm peer-focus:text-indigo-500">
                    {{ __('Password') }}
                </label>

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <!-- Heroicon: Check Circle -->
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2 4-4M12 20a8 8 0 100-16 8 8 0 000 16z"/>
                    </svg>
                </span>

                <input id="password_confirmation" name="password_confirmation" type="password" required
                    placeholder=" "
                    class="peer pl-10 pt-4 pb-2 w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition" />

                <label for="password_confirmation"
                    class="absolute left-10 top-2 text-sm text-gray-500 transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-sm peer-focus:text-indigo-500">
                    {{ __('Confirm Password') }}
                </label>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Register Button -->
            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('login') }}"
                    class="text-sm text-indigo-600 hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
