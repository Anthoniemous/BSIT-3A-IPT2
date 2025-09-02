<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 bg-white p-8 rounded-2xl shadow-lg border border-pink-200">
        <h2 class="text-2xl font-bold text-center text-pink-600 mb-6">Create Your Account 💖</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" class="text-pink-700 font-semibold" />
                <x-text-input id="name"
                              class="block mt-1 w-full rounded-lg border-pink-300 focus:border-pink-500 focus:ring-pink-500 shadow-sm"
                              type="text"
                              name="name"
                              :value="old('name')"
                              required
                              autofocus
                              autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-pink-500" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" class="text-pink-700 font-semibold" />
                <x-text-input id="email"
                              class="block mt-1 w-full rounded-lg border-pink-300 focus:border-pink-500 focus:ring-pink-500 shadow-sm"
                              type="email"
                              name="email"
                              :value="old('email')"
                              required
                              autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-pink-500" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-pink-700 font-semibold" />
                <x-text-input id="password"
                              class="block mt-1 w-full rounded-lg border-pink-300 focus:border-pink-500 focus:ring-pink-500 shadow-sm"
                              type="password"
                              name="password"
                              required
                              autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-pink-500" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-pink-700 font-semibold" />
                <x-text-input id="password_confirmation"
                              class="block mt-1 w-full rounded-lg border-pink-300 focus:border-pink-500 focus:ring-pink-500 shadow-sm"
                              type="password"
                              name="password_confirmation"
                              required
                              autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-pink-500" />
            </div>

            <div class="flex items-center justify-between mt-6">
                <a class="underline text-sm text-gray-600 hover:text-pink-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500"
                   href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4 bg-pink-500 hover:bg-pink-600 text-white px-6 py-2 rounded-lg shadow-md transition">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
