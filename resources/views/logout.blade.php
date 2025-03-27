<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .logout-container {
            text-align: center;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .logout-container h2 {
            margin-bottom: 10px;
        }
        .logout-container p {
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            background: #ff4757;
            border-radius: 5px;
        }
        .btn:hover {
            background: #e84118;
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <h2>Déconnexion réussie</h2>
        <p>Vous avez été déconnecté avec succès.</p>
        <a href="{{ route('login') }}" class="btn">Se reconnecter</a>
    </div>
</body>
</html>
