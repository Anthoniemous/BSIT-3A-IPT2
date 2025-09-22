<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body class="login-body">

    <div class="login-container">
        <div class="login-card">
            
             <div class="login-header">
                <img src="{{ asset('image/logo.jpg') }}" alt="Logo" class="logo">
                <h2>Register Here</h2>
            </div>

            @if (session('status'))
                <div class="session-status">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required>
                    @error('password')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required>
                    @error('password_confirmation')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-footer">
                    <a href="{{ route('login') }}" class="forgot-password">Already registered?</a>
                    <button type="submit" class="btn-login">Register</button>
                </div>

            </form>

        </div>
    </div>

</body>
</html>
