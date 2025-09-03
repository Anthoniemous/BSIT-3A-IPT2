<x-guest-layout>
    <div class="flex flex-col items-center justify-center dark:bg-gray-800 ">
          <!-- Title -->
          


        <div class="w-full max-w-md p-8 rounded-2xl shadow-2xl dark:bg-gray-800">
            
          
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form class="dark:bg-gray-800" method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-300"/>
                    <x-text-input id="email" class="block mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autofocus 
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300"/>
                    <x-text-input id="password" class="block mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                        type="password"
                        name="password"
                        required 
                        autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Forgot Password -->
                <div class="flex items-center justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" 
                            class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <!-- Actions -->
              <div class="flex gap-4 mt-6 p-3">
                    <!-- Register Button -->
                    <a href="{{ route('register') }}" 
                    class="w-1/2 text-center px-6 py-2 rounded-lg shadow-md bg-gray-500 hover:bg-gray-600 text-white transition ease-in-out duration-200">
                        {{ __("Register") }}
                    </a>



                    <button  class="w-1/2 text-center px-6 py-2 rounded-lg shadow-md bg-gray-500 hover:bg-gray-600 text-white transition ease-in-out duration-200">
                        {{ __('Log in') }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-guest-layout>
