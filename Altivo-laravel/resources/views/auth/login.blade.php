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

            <!-- Divider -->
                <div class="flex items-center my-4">
                    <hr class="flex-grow border-yellow-300">
                    <span class="mx-2 text-yellow-300 text-xs">OR</span>
                    <hr class="flex-grow border-yellow-300">
                </div>

                <!-- Google Login Button -->
                <a href="{{ route('google.redirect') }}" 
                class="w-full inline-flex items-center justify-center px-4 py-3 bg-yellow-200 text-purple-900 font-semibold hover:bg-yellow-300 hover:text-purple-800 transition-all duration-300 rounded-xl shadow-lg">
                    <svg class="w-5 h-5 mr-2" viewBox="0 0 533.5 544.3">
                        <path fill="#d4a373" d="M533.5 278.4c0-17.4-1.6-34-4.6-50.2H272.1v95.3h147.5c-6.3 33.9-25.4 62.6-54.1 81.8l87.2 67.8c51-47 80.8-116.3 80.8-194.7z"/>
                        <path fill="#facc15" d="M272.1 544.3c73.4 0 135-24.3 179.9-66.1l-87.2-67.8c-24.2 16.3-55.2 26-92.7 26-71 0-131.3-47.9-152.9-112.1l-90.2 69.6c43.9 87.3 134 150.4 243.1 150.4z"/>
                        <path fill="#fde047" d="M119.2 324.2c-10.3-30-10.3-62.5 0-92.5l-90.2-69.6c-39.4 77.6-39.4 168.2 0 245.8l90.2-69.7z"/>
                        <path fill="#facc15" d="M272.1 107.7c38.9-.6 75.7 13.7 103.8 39.9l77.5-77.5C406.9 24.2 344.9 0 272.1 0 163 0 72.9 63.1 29 150.4l90.2 69.6c21.6-64.2 81.9-112.3 152.9-112.3z"/>
                    </svg>
                    Continue with Google
                </a>

            </div>
        </div>
    </div>
</x-guest-layout>
