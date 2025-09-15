<x-guest-layout>
    <style>
        /* Background */
        .login-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to right, #a935f7ff, #b8ebffff);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Card Box */
        .login-box {
            background: #fff;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 420px;
            text-align: center;
        }

        /* Title */
        .login-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: #fa00ddff;
            margin-bottom: 1.5rem;
        }

        /* Input Groups */
        .input-group {
            margin-bottom: 1.2rem;
            text-align: left;
        }

        .custom-label {
            font-weight: 600;
            font-size: 0.95rem;
            color: #333;
        }

        .custom-input {
            width: 100%;
            margin-top: 0.5rem;
            padding: 0.75rem 1rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: 0.3s;
        }

        .custom-input:focus {
            border-color: #4a3fdd;
            box-shadow: 0 0 6px rgba(74, 63, 221, 0.3);
            outline: none;
        }

        /* Errors */
        .error-message {
            color: #e53e3e;
            font-size: 0.85rem;
            margin-top: 0.25rem;
        }

        /* Remember Me */
        .remember-me {
            margin: 1rem 0;
            font-size: 0.9rem;
            color: #444;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        /* Actions */
        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1.5rem;
        }

        /* Forgot Password Link */
        .forgot-link {
            font-size: 0.9rem;
            color: #928ed4ff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .forgot-link:hover {
            color: #c041abff;
        }

        /* Login Button */
        .login-btn {
            background: #da33b3ff !important;
            border: none;
            padding: 0.7rem 1.6rem;
            border-radius: 8px;
            color: #fff;
            font-size: 0.95rem;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-btn:hover {
            background: #f07affff !important;
        }
    </style>

    <div class="login-container">
        <div class="login-box">
            <!-- Title -->
            <h2 class="login-title">Welcome Back 👋</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="input-group">
                    <x-input-label for="email" :value="__('Email')" class="custom-label" />
                    <x-text-input id="email" class="custom-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="error-message" />
                </div>

                <!-- Password -->
                <div class="input-group">
                    <x-input-label for="password" :value="__('Password')" class="custom-label" />
                    <x-text-input id="password" class="custom-input" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="error-message" />
                </div>

                <!-- Remember Me -->
                <div class="remember-me">
                    <label for="remember_me">
                        <input id="remember_me" type="checkbox" name="remember">
                        <span>{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Actions -->
                <div class="actions">
                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif

                    <x-primary-button class="login-btn">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>

           <!-- Divider -->
            <div class="flex items-center my-4">
                <hr class="flex-grow border-pink-400">
                <span class="mx-2 text-pink-500 text-xs">OR</span>
                <hr class="flex-grow border-pink-400">
            </div>

            <!-- Google Login Button -->
            <a href="{{ route('google.redirect') }}" 
            class="w-full inline-flex items-center justify-center px-4 py-2 
                    bg-pink-300 hover:bg-pink-400 
                    text-white font-semibold 
                    rounded-xl shadow-lg transition-all duration-300">
                <svg class="w-5 h-5 mr-2" viewBox="0 0 533.5 544.3">
                    <path fill="#4285F4" d="M533.5 278.4c0-17.4-1.6-34-4.6-50.2H272.1v95.3h147.5c-6.3 33.9-25.4 62.6-54.1 81.8l87.2 67.8c51-47 80.8-116.3 80.8-194.7z"/>
                    <path fill="#34A853" d="M272.1 544.3c73.4 0 135-24.3 179.9-66.1l-87.2-67.8c-24.2 16.3-55.2 26-92.7 26-71 0-131.3-47.9-152.9-112.1l-90.2 69.6c43.9 87.3 134 150.4 243.1 150.4z"/>
                    <path fill="#FBBC05" d="M119.2 324.2c-10.3-30-10.3-62.5 0-92.5l-90.2-69.6c-39.4 77.6-39.4 168.2 0 245.8l90.2-69.7z"/>
                    <path fill="#EA4335" d="M272.1 107.7c38.9-.6 75.7 13.7 103.8 39.9l77.5-77.5C406.9 24.2 344.9 0 272.1 0 163 0 72.9 63.1 29 150.4l90.2 69.6c21.6-64.2 81.9-112.3 152.9-112.3z"/>
                </svg>
                Login with Google
            </a>


        </div>
    </div>
</x-guest-layout>
