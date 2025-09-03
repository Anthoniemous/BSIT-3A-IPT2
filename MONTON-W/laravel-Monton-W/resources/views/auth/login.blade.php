<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <section class="flex flex-col gap-4">

            <h1 class="text-xl font-bold text-center">Log in to your account</h1>

            <div class="flex flex-col gap-2">
                <!-- Email Address -->
                <div>


                    <x-input-label for="email" :value="__('Email')" />


                    <div>

                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>

                <!-- Password -->
                <div class="mt-4">


                    <x-input-label for="password" :value="__('Password')" />



                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />


                    <x-input-error :messages="$errors->get('password')" class="mt-2" />


                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4 flex-col gap-3">
                    <section class="flex items-center gap-3">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="underline text-sm text-gray-600 focus:ring-indigo-500 hover:text-gray-900">
                                Register
                            </a>
                        @endif
                    </section>

                    <x-primary-button class="ms-3 ">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>

            </div>

        </section>
    </form>
</x-guest-layout>
