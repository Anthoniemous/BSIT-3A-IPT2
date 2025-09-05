<x-guest-layout>
    <style>
        /* Background */
        .register-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to right, #cb2fd3ff, #7ac8f3ff);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Card Box */
        .register-box {
            background: #fff;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(247, 106, 231, 0.85);
            width: 100%;
            max-width: 450px;
            text-align: center;
        }

        /* Title */
        .register-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: #185a9d;
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
            border-color: #185a9d;
            box-shadow: 0 0 6px rgba(249, 153, 231, 0.3);
            outline: none;
        }

        /* Errors */
        .error-message {
            color: #e53e3e;
            font-size: 0.85rem;
            margin-top: 0.25rem;
        }

        /* Actions */
        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1.5rem;
        }

        /* Login Link */
        .login-link {
            font-size: 0.9rem;
            color: #185a9d;
            text-decoration: none;
            transition: color 0.3s;
        }

        .login-link:hover {
            color: #0d3a61;
        }

        /* Register Button */
        .register-btn {
            background: #185a9d !important;
            border: none;
            padding: 0.7rem 1.6rem;
            border-radius: 8px;
            color: #ff9af8ff;
            font-size: 0.95rem;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .register-btn:hover {
            background: #0d3a61 !important;
        }
    </style>

    <div class="register-container">
        <div class="register-box">
            <!-- Title -->
            <h2 class="register-title">Create an Account ✨</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="input-group">
                    <x-input-label for="name" :value="__('Name')" class="custom-label"/>
                    <x-text-input id="name" class="custom-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="error-message" />
                </div>

                <!-- Email Address -->
                <div class="input-group">
                    <x-input-label for="email" :value="__('Email')" class="custom-label"/>
                    <x-text-input id="email" class="custom-input" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="error-message" />
                </div>

                <!-- Password -->
                <div class="input-group">
                    <x-input-label for="password" :value="__('Password')" class="custom-label"/>
                    <x-text-input id="password" class="custom-input" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="error-message" />
                </div>

                <!-- Confirm Password -->
                <div class="input-group">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="custom-label"/>
                    <x-text-input id="password_confirmation" class="custom-input" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" />
                </div>

                <!-- Actions -->
                <div class="actions">
                    <a class="login-link" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="register-btn">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
