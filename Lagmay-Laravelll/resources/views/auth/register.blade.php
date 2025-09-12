@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-pink-200 via-yellow-200 to-pink-100">
    <div class="w-full max-w-md p-8 bg-white/70 backdrop-blur-lg rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-center text-pink-600 mb-6">Create Your Account</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-pink-500">{{ __('Name') }}</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="mt-1 block w-full rounded-md border border-pink-300 px-3 py-2 focus:border-yellow-400 focus:ring focus:ring-yellow-200">
                @error('name')
                <span class="text-pink-600 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="email" class="block text-sm font-medium text-pink-500">{{ __('Email Address') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
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

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password-confirm" class="block text-sm font-medium text-pink-500">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" name="password_confirmation" required
                       class="mt-1 block w-full rounded-md border border-pink-300 px-3 py-2 focus:border-yellow-400 focus:ring focus:ring-yellow-200">
            </div>

            <!-- Register Button -->
            <div class="mt-6">
                <button type="submit"
                        class="w-full py-2.5 bg-gradient-to-r from-yellow-300 to-pink-400 hover:from-pink-400 hover:to-yellow-300 text-pink-900 font-semibold rounded-md shadow">
                    {{ __('Register') }}
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
