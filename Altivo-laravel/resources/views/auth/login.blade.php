<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-200 via-purple-300 to-purple-200">
        <!-- Glassmorphism login card -->
        <div class="w-full max-w-md p-10 bg-white/30 backdrop-blur-md rounded-3xl shadow-xl border border-yellow-200/50">
            
            <!-- Header -->
            <div class="text-center mb-6">
                <h1 class="text-4xl font-extrabold text-yellow-200 drop-shadow-md">Welcome</h1>
                <p class="mt-2 text-purple-700">Login to your account</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

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
                        required autofocus autocomplete="username" 
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
                        required autocomplete="current-password" 
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>

               <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between mt-2">
                      <label class="inline-flex items-center text-purple-700">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded border-yellow-200 text-yellow-300 focus:ring-yellow-200">
                     <span class="ml-2 text-sm">Remember me</span>
                     </label>

                 @if (Route::has('password.request'))
                      <a href="{{ route('password.request') }}" class="text-sm text-purple-700 hover:text-purple-800 underline transition-colors duration-300">
                                   Forgot your password?
                         </a>
                    @endif
                </div>


                <!-- Submit Button -->
                <div>
                    <x-primary-button class="w-full bg-yellow-200 text-purple-900 font-semibold hover:bg-yellow-300 hover:text-purple-800 transition-all duration-300 py-3 rounded-xl shadow-lg">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
