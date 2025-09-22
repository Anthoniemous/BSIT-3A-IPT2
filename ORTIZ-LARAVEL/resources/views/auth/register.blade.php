<x-guest-layout>
    <!-- Background with blurred pastry image -->
    <div class="relative min-h-screen flex items-center justify-center bg-yellow-100">
        <div class="absolute inset-0">
            <img src="/images/Anicette-welcomepage.jpeg" 
                 alt="Pastry Background" 
                 class="w-full h-full object-cover filter blur-sm brightness-75">
        </div>

        <!-- Register Card -->
        <div class="relative z-10 w-full max-w-md p-10 bg-white/90 backdrop-blur-lg rounded-2xl shadow-2xl border border-yellow-300">
            
            <!-- Logo + Title -->
            <div class="flex flex-col items-center mb-6">
                <img src="/images/anicette-logo.jpg" alt="Anicette Logo" class="w-16 h-16 rounded-full shadow-md mb-3">
                <h2 class="text-3xl font-[Parisienne] text-yellow-800">Create Account</h2>
                <p class="text-sm text-yellow-700">Join us and enjoy sweet delights</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Name')" class="text-yellow-800 font-bold"/>
                    <x-text-input id="name" 
                        class="block mt-1 w-full bg-white border border-yellow-400 rounded-lg px-3 py-2
                               text-gray-800 placeholder-gray-400
                               focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition duration-300"
                        type="text" 
                        name="name" 
                        :value="old('name')" 
                        required 
                        autofocus 
                        autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="text-yellow-800 font-bold"/>
                    <x-text-input id="email" 
                        class="block mt-1 w-full bg-white border border-yellow-400 rounded-lg px-3 py-2
                               text-gray-800 placeholder-gray-400
                               focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition duration-300"
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" class="text-yellow-800 font-bold"/>
                    <x-text-input id="password" 
                        class="block mt-1 w-full bg-white border border-yellow-400 rounded-lg px-3 py-2
                               text-gray-800 placeholder-gray-400
                               focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition duration-300"
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-yellow-800 font-bold"/>
                    <x-text-input id="password_confirmation" 
                        class="block mt-1 w-full bg-white border border-yellow-400 rounded-lg px-3 py-2
                               text-gray-800 placeholder-gray-400
                               focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition duration-300"
                        type="password" 
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row items-center justify-between mt-4">
                    <a class="text-sm text-yellow-700 hover:text-yellow-900 underline mb-2 sm:mb-0" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ml-0 sm:ml-4 w-full sm:w-auto bg-yellow-700 hover:bg-yellow-800 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
