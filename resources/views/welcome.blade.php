<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Village Comptable</title>
    <style>
        body {
            background-color: black;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
            overflow: hidden;
        }

        .image-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            height: 300px;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            animation: fadeInOut 5s infinite alternate;
        }

        @keyframes fadeInOut {
            0% { opacity: 0; transform: scale(0.8); }
            50% { opacity: 1; transform: scale(1); }
            100% { opacity: 0; transform: scale(1.2); }
        }

        .login-button {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: white;
            color: black;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <button class="login-button" onclick="window.location.href='{{ route('login') }}'">Login</button>
    <div class="image-container">
        <img src="{{ asset('images/logo.jpeg') }}" alt="Logo animé">
    </div>
</body>
</html>
