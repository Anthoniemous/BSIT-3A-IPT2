<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-white" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-white" />
            <x-text-input id="email"
                          class="block mt-1 w-full text-black"
                          type="email"
                          name="email"
                          :value="old('email')"
                          required
                          autofocus
                          autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-white" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-white" />
            <x-text-input id="password"
                          class="block mt-1 w-full text-black"
                          type="password"
                          name="password"
                          required
                          autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-white" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me"
                       type="checkbox"
                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                       name="remember">
                <span class="ms-2 text-sm text-white">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-white hover:text-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                   href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
           
        </div>
<span class="flex items-center justify-center text-white text-lg font-medium ml-4">Or</span>

         <!-- Continue with Google -->
    <div class="w-3/5 mx-auto mt-4">
    <a href="{{ route('google-auth') }}"
       class="flex items-center justify-center w-full py-2 px-4 bg-white text-gray-800 rounded-md shadow hover:bg-gray-100 transition focus:ring-2 focus:ring-indigo-800 focus:ring-offset-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
             class="bi bi-google ml-2" viewBox="0 0 16 16">
            <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.364 5.885C11.926 15.464 10.068 16 8 16c-3.866 0-7-3.134-7-7s3.134-7 
                     7-7c1.89 0 3.617.707 4.93 1.878l-2.004 1.996C9.21 4.288 8.637 4.11 8 
                     4.11c-2.22 0-4.022 1.803-4.022 4.022s1.803 4.022 4.022 4.022c1.933 
                     0 3.29-1.11 3.563-2.639H8v-2.145h7.545z"/>
        </svg>
        <span class="text-sm text-left ml-4">Continue with Google</span>
    </a>
</div>


    </form>
</x-guest-layout>
