<x-guest-layout>
    <div class="w-full max-w-md bg-gray-900 rounded-lg shadow-lg p-8">
            
            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-pink-400" :status="session('status')" />

            <h2 class="text-2xl font-bold text-center text-pink-500 mb-6">
                {{ __('Welcome Back') }}
            </h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-pink-400" />
                    <x-text-input 
                        id="email" 
                        class="block mt-1 w-full rounded-lg bg-gray-800 text-white border border-gray-700 focus:border-pink-500 focus:ring-pink-500" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autofocus 
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
                        autocomplete="current-password" 
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-pink-400" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input 
                            id="remember_me" 
                            type="checkbox" 
                            class="rounded border-gray-600 bg-gray-800 text-pink-500 focus:ring-pink-500" 
                            name="remember"
                        >
                        <span class="ms-2 text-sm text-gray-300">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-pink-400 hover:text-pink-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3 bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded-lg shadow-md transition duration-200">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
</x-guest-layout>
