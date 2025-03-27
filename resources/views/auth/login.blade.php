<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - VILLAGE COMPTABLE</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
        }
        .image-container {
            flex: 1;
            background-image: url("{{ asset('images/login2.jpeg') }}");
            background-size: cover;
            background-position: center;
        }
        .login-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f4;
        }
        .login-form {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }
        .login-form h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }
        .login-form p {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }
        .logo-img {
            width: 100px;
            height: 100px;
            border-radius: 100%;
            object-fit: cover;
        }
        .login-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .password-container {
            position: relative;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .login-form button {
            padding: 10px 20px;
            background-color: #0e0e0e;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .login-form button:hover {
            background-color: #020202;
        }
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #f5c6cb;
            text-align: left;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #c3e6cb;
            text-align: left;
        }
    </style>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('togglePassword');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggleIcon.textContent = '👁️';
            }
        }
    </script>
</head>
<body>
    <div class="image-container"></div>
    <div class="login-container">
        <div class="login-form">
            <h1>VILLAGE COMPTABLE</h1>
            <p>Bienvenue ! Connectez-vous à votre compte</p>

            <div class="mb-6 flex items-center space-x-3">
                <div>
                    <img src="{{ asset('images/app2.jpg') }}" alt="Logo" class="logo-img">
                </div>
            </div>

            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('error'))
                <div class="error-message">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <input type="email" name="email" placeholder="Adresse e-mail" required value="{{ old('email') }}">
                <div class="password-container">
                    <input type="password" name="password" id="password" placeholder="Mot de passe" required>
                    <span class="toggle-password" id="togglePassword" onclick="togglePassword()">👁️</span>
                </div>
                <div class="button-container">
                    <button type="submit">Se connecter</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
