<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('./css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/home.css') }}">
</head>

<body>
    <section class="login-section">
        <div class="login-container">
            <div class="login-header">
                <h2>Welcome Back!</h2>
                <p>Please login to your account</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-group">
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" id="password" name="password" required>
                    </div>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-login">
                    Login <i class="fas fa-arrow-right"></i>
                </button>

            </form>
        </div>
    </section>
</body>

</html>
