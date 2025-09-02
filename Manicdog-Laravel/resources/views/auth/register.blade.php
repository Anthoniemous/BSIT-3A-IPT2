<x-guest-layout>
    <div class="flex items-center justify-center bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 px-4 py-12">
        <div class="bg-white dark:bg-gray-900 shadow-2xl rounded-3xl p-8 sm:p-10 w-full max-w-xl transition-transform transform hover:scale-[1.01]">
            
            <!-- Header -->
            <div class="text-center mb-6">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Create an Account!</h1>
                <p class="text-gray-500 dark:text-gray-400 mt-1">Join us today and get started!</p>
            </div>

            <!-- Register Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-gray-700 dark:text-gray-300" />
                    <x-text-input 
                        id="name" 
                        class="block mt-1 w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                        type="text" 
                        name="name" 
                        :value="old('name')" 
                        required 
                        autofocus 
                        autocomplete="name" 
                    />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-300" />
                    <x-text-input 
                        id="email" 
                        class="block mt-1 w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autocomplete="username" 
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300" />
                    <x-text-input 
                        id="password" 
                        class="block mt-1 w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="new-password" 
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 dark:text-gray-300" />
                    <x-text-input 
                        id="password_confirmation" 
                        class="block mt-1 w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                        type="password" 
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password" 
                    />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
                </div>

                <!-- Register Button -->
                <div>
                    <x-primary-button 
                        class="w-full justify-center py-3 rounded-xl text-lg shadow-md bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-400 transition duration-200"
                    >
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Divider -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300 dark:border-gray-700"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="bg-white dark:bg-gray-900 px-3 text-sm text-gray-500 dark:text-gray-400">or</span>
                </div>
            </div>

            <!-- Login Link -->
            <p class="text-center text-sm text-gray-600 dark:text-gray-400">
                Already have an account?  
                <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 transition font-medium">
                    Log in here
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>
