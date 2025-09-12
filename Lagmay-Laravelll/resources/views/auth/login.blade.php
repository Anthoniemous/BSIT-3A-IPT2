@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-pink-200 via-yellow-200 to-pink-100">
    <div class="w-full max-w-md p-8 bg-white/70 backdrop-blur-lg rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-center text-pink-600 mb-6">Welcome Back</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-pink-500">{{ __('Email Address') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="mt-1 block w-full rounded-md border border-pink-300 px-3 py-2 focus:border-yellow-400 focus:ring focus:ring-yellow-200">
                @error('email')
                <span class="text-pink-600 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-pink-500">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required
                       class="mt-1 block w-full rounded-md border border-pink-300 px-3 py-2 focus:border-yellow-400 focus:ring focus:ring-yellow-200">
                @error('password')
                <span class="text-pink-600 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember" class="inline-flex items-center text-pink-600">
                    <input id="remember" type="checkbox" name="remember"
                           class="rounded border-pink-400 text-yellow-400 focus:ring-pink-300">
                    <span class="ml-2 text-sm">{{ __('Remember Me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-pink-500 hover:text-pink-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-200"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif

                <button type="submit"
                        class="ml-3 w-full py-2.5 bg-gradient-to-r from-yellow-300 to-pink-400 hover:from-pink-400 hover:to-yellow-300 text-pink-900 font-semibold rounded-md shadow">
                    {{ __('Login') }}
                </button>
            </div>

        </form>

        <!-- Divider -->
<div class="flex items-center my-6">
    <hr class="flex-grow border-gray-300">
    <span class="px-3 text-gray-500 text-sm">or</span>
    <hr class="flex-grow border-gray-300">
</div>

                    <!-- Continue with Google -->
<a href="{{ route('google-auth') }}"
   class="flex items-center justify-center w-full py-2.5 bg-white border border-gray-300 rounded-lg shadow hover:shadow-md transition duration-200">
    <img src="https://www.svgrepo.com/show/355037/google.svg" 
         alt="Google" 
         class="w-5 h-5 mr-2">
    <span class="text-gray-700 text-sm font-medium">Continue with Google</span>
</a>


    </div>
</div>
@endsection
