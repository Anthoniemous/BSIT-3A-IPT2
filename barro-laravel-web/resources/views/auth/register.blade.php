<x-guest-layout>
    <div class="w-full max-w-md bg-gray-900 rounded-lg shadow-lg p-8">
            
            <h2 class="text-2xl font-bold text-center text-pink-500 mb-6">
                {{ __('Create an Account') }}
            </h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-pink-400" />
                    <x-text-input 
                        id="name" 
                        class="block mt-1 w-full rounded-lg bg-gray-800 text-white border border-gray-700 focus:border-pink-500 focus:ring-pink-500" 
                        type="text" 
                        name="name" 
                        :value="old('name')" 
                        required 
                        autofocus 
                        autocomplete="name" 
                    />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-pink-400" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" class="text-pink-400" />
                    <x-text-input 
                        id="email" 
                        class="block mt-1 w-full rounded-lg bg-gray-800 text-white border border-gray-700 focus:border-pink-500 focus:ring-pink-500" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autocomplete="username" 
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-pink-400" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-pink-400" />
                    <x-text-input 
                        id="password" 
                        class="block mt-1 w-full rounded-lg bg-gray-800 text-white border border-gray-700 focus:border-pink-500 focus:ring-pink-500" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="new-password" 
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-pink-400" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-pink-400" />
                    <x-text-input 
                        id="password_confirmation" 
                        class="block mt-1 w-full rounded-lg bg-gray-800 text-white border border-gray-700 focus:border-pink-500 focus:ring-pink-500" 
                        type="password" 
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password" 
                    />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-pink-400" />
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between mt-6">
                    <a class="underline text-sm text-pink-400 hover:text-pink-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ms-4 bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded-lg shadow-md transition duration-200">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
</x-guest-layout>
