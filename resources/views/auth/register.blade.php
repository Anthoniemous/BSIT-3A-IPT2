<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-200 via-purple-300 to-purple-200">
        <!-- Glassmorphism card -->
        <div class="w-full max-w-md p-10 bg-white/30 backdrop-blur-md rounded-3xl shadow-xl border border-yellow-200/50">
            
            <!-- Header -->
            <div class="text-center mb-6">
                <h1 class="text-4xl font-extrabold text-yellow-200 drop-shadow-md">Create Account</h1>
                <p class="mt-2 text-purple-700">Register to access your account</p>
            </div>

            <!-- Registration Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-yellow-300"/>
                    <x-text-input 
                        id="name" 
                        class="block mt-1 w-full border border-yellow-200 bg-white/40 text-purple-900 placeholder-yellow-100 focus:ring-yellow-300 focus:border-yellow-300 rounded-xl transition-all duration-300 shadow-sm" 
                        type="text" 
                        name="name" 
                        :value="old('name')" 
                        placeholder="Enter your name"
                        required autofocus autocomplete="name" 
                    />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-yellow-300"/>
                    <x-text-input 
                        id="email" 
                        class="block mt-1 w-full border border-yellow-200 bg-white/40 text-purple-900 placeholder-yellow-100 focus:ring-yellow-300 focus:border-yellow-300 rounded-xl transition-all duration-300 shadow-sm" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        placeholder="Enter your email"
                        required autocomplete="username" 
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-yellow-300"/>
                    <x-text-input 
                        id="password" 
                        class="block mt-1 w-full border border-yellow-200 bg-white/40 text-purple-900 placeholder-yellow-100 focus:ring-yellow-300 focus:border-yellow-300 rounded-xl transition-all duration-300 shadow-sm" 
                        type="password" 
                        name="password" 
                        placeholder="Enter your password"
                        required autocomplete="new-password" 
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-yellow-300"/>
                    <x-text-input 
                        id="password_confirmation" 
                        class="block mt-1 w-full border border-yellow-200 bg-white/40 text-purple-900 placeholder-yellow-100 focus:ring-yellow-300 focus:border-yellow-300 rounded-xl transition-all duration-300 shadow-sm" 
                        type="password" 
                        name="password_confirmation" 
                        placeholder="Confirm your password"
                        required autocomplete="new-password" 
                    />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
                </div>

                <!-- Already Registered & Register Button -->
                <div class="flex items-center justify-between mt-4">
                    <a class="text-sm text-purple-700 hover:text-purple-800 underline transition-colors duration-300" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="bg-yellow-200 text-purple-900 font-semibold hover:bg-yellow-300 hover:text-purple-800 transition-all duration-300 py-3 px-6 rounded-xl shadow-lg">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
