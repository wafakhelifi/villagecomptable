<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Utilisateur</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header Styles */
        header {
            background-color: #007bff;
            color: white;
            padding: 15px 20px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            position: fixed;
            height: 100%;
            padding-top: 80px;
            transition: all 0.3s;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
        }

        .sidebar-menu li {
            padding: 10px 20px;
            border-bottom: 1px solid #4b545c;
        }

        .sidebar-menu li a {
            color: white;
            text-decoration: none;
            display: block;
        }

        .sidebar-menu li:hover {
            background-color: #4b545c;
        }

        /* Main Content Styles */
        .main-content {
            margin-left: 250px;
            margin-top: 80px;
            padding: 20px;
            flex: 1;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .card-header {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .btn-container {
            text-align: center;
            margin-top: 30px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 1rem;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Footer Styles */
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: auto;
        }

        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            color: #fff;
            text-align: center;
        }

        .alert-success {
            background-color: #28a745;
        }

        .alert-danger {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-content">
            <div class="logo">Biennevenue!</div>
        </div>
    </header>

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="sidebar-menu">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Utilisateurs</a></li>
            <li><a href="#">Paramètres</a></li>
            <li><a href="#">Profil</a></li>
            <li><a href="#">Déconnexion</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="container">
            <div class="card">
                <div class="card-header">Modifier Utilisateur</div>
                <form method="POST" action="{{ route('update_user', ['id' => $user->id]) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="firstname">Prénom</label>
                        <input type="text" id="firstname" name="firstname" value="{{ old('firstname', $user->firstname) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="lastname">Nom</label>
                        <input type="text" id="lastname" name="lastname" value="{{ old('lastname', $user->lastname) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Téléphone</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="post">Poste</label>
                        <input type="text" id="post" name="post" value="{{ old('post', $user->post) }}" required>
                    </div>

                    <div class="btn-container">
                        <button type="submit" class="btn-primary">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2023 Admin Dashboard. Tous droits réservés.</p>
    </footer>
</body>
</html>