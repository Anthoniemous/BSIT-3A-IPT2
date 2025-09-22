<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<body class="relative min-h-screen w-full bg-gradient-to-br from-yellow-200 via-orange-100 to-red-200 flex items-center justify-center">

    <!-- Floating form container -->
    <div class="relative w-full max-w-md p-10 bg-white/70 backdrop-blur-lg rounded-3xl shadow-2xl z-10">
        <h2 class="text-3xl font-extrabold text-center text-red-600 mb-6">Create Your Account 🍕</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <x-input-label for="name" :value="__('Name')" class="!text-red-600" />
                <x-text-input id="name" class="block mt-1 w-full border-red-300 focus:border-red-500 focus:ring focus:ring-red-200 rounded-lg" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-700" />
            </div>

            <!-- Email -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="!text-red-600" />
                <x-text-input id="email" class="block mt-1 w-full border-red-300 focus:border-red-500 focus:ring focus:ring-red-200 rounded-lg" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-700" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" class="!text-red-600" />
                <x-text-input id="password" class="block mt-1 w-full border-red-300 focus:border-red-500 focus:ring focus:ring-red-200 rounded-lg" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-700" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="!text-red-600" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full border-red-300 focus:border-red-500 focus:ring focus:ring-red-200 rounded-lg" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-700" />
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between mb-4">
                <a class="underline text-sm text-red-700 hover:text-red-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-300" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-3 bg-gradient-to-r from-red-500 to-orange-400 hover:from-orange-400 hover:to-red-500 text-white">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>


       
    </div>

    <!-- Optional: subtle gradient overlay behind form -->
    <div class="absolute inset-0 bg-gradient-to-br from-yellow-200 via-orange-100 to-red-200 -z-10"></div>

</body>
</html>
