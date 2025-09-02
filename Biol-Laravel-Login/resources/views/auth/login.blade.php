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

        </div>
    </div>

</body>
</html>
