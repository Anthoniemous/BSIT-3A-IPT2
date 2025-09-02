<x-guest-layout>
    <div class="bg-gradient-to-br from-indigo-50 via-white to-purple-50 flex items-center justify-center p-6">
        <div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="hidden md:flex relative items-center justify-center rounded-2xl overflow-hidden bg-gradient-to-br from-indigo-600 to-purple-600 p-10">
                <div class="absolute inset-0 opacity-25 blur-3xl bg-[radial-gradient(ellipse_at_top_left,_var(--tw-gradient-stops))] from-white/60 via-transparent to-transparent"></div>
                <div class="relative text-white">
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-10 rounded-xl bg-white/15 backdrop-blur flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                                <path d="M12 3l8 4.5v9L12 21l-8-4.5v-9L12 3zm0 2.236L6 8v8l6 3.236L18 16V8l-6-2.764z" />
                            </svg>
                        </div>
                        <span class="text-lg font-semibold tracking-wide">YourApp</span>
                    </div>
                    <h2 class="mt-8 text-3xl font-semibold">Welcome back</h2>
                    <p class="mt-2 text-white/80">Sign in to continue to your dashboard.</p>
                    <div class="mt-10 grid grid-cols-3 gap-4 opacity-95">
                        <div class="h-24 rounded-2xl bg-white/10 backdrop-blur border border-white/10"></div>
                        <div class="h-24 rounded-2xl bg-white/10 backdrop-blur border border-white/10"></div>
                        <div class="h-24 rounded-2xl bg-white/10 backdrop-blur border border-white/10"></div>
                    </div>
                </div>
            </div>

            <div class="bg-black/70  rounded-2xl p-8 md:p-10">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <div class="mb-8">
                    <h1 class="text-2xl font-semibold text-gray-900">Sign in to your account</h1>
                    <p class="mt-1 text-sm text-gray-500">Enter your credentials to access the app.</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex items-center justify-between">
                            <x-input-label for="password" :value="__('Password')" />
                            @if (Route::has('password.request'))
                                <a class="text-sm text-indigo-600 hover:text-indigo-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 rounded" href="{{ route('password.request') }}">
                                    {{ __('Forgot?') }}
                                </a>
                            @endif
                        </div>
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-700">{{ __('Remember me') }}</span>
                        </label>
                        @if (Route::has('register'))
                            <a class="text-sm text-gray-500 hover:text-gray-700" href="{{ route('register') }}">{{ __('Create account') }}</a>
                        @endif
                    </div>

                    <div>
                        <x-primary-button class="w-full justify-center h-11">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
