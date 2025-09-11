{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - MyApp</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="login-body">

    <div class="login-container">
        <div class="login-card">

            <div class="login-header">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="logo">
                <h2>Welcome Back</h2>
                <p>Please log in to your account</p>
            </div>

            @if (session('status'))
                <div class="session-status">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required>
                    @error('password')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Remember Me --}}
                <div class="form-group remember-me">
                    <label>
                        <input type="checkbox" name="remember">
                        Remember Me
                    </label>
                </div>

                {{-- Forgot Password + Submit --}}
                <div class="form-footer">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-password">Forgot your password?</a>
                    @endif

                    <button type="submit" class="btn-login">Login</button>
                </div>
            </form>
            <div class="google-login">
                <a class="btn-165" href="{{ route('google-auth') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 262">
                        <path fill="#4285F4" d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027"></path>
                        <path fill="#34A853" d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1"></path>
                        <path fill="#FBBC05" d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782"></path>
                        <path fill="#EB4335" d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251"></path>
                                </svg>
                                <span>Login with Google</span>
                        </div>

         </div>
    </div>

</body>
</html>
