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
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs</title>
    <style>
        /* Styles généraux */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            font-size: 28px;
            color: #333;
        }

        /* Conteneur principal */
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Boutons principaux */
        .btn {
            background-color: #0e0e0e;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            margin: 10px;
        }
        .btn:hover {
            background-color: #333;
        }

        /* Table utilisateur */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f5f5f5;
            font-weight: bold;
            color: #555;
        }

        /* Formulaires modaux */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            visibility: hidden;
            opacity: 0;
            transition: visibility 0.3s, opacity 0.3s;
            z-index: 1000;
        }
        .overlay.active {
            visibility: visible;
            opacity: 1;
        }

        .modal {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #0e0e0e;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #333;
        }
        .close-btn {
            background-color: #e74c3c;
            padding: 8px 12px;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>📋 Gestion des Utilisateurs</h1>

        <!-- Boutons d'actions -->
        <button class="btn" onclick="openAddModal()">➕ Ajouter Utilisateur</button>
        <button class="btn" onclick="openSearchModal()">🔍 Chercher Utilisateur</button>

        <!-- Table des utilisateurs -->
       
                    <!-- Table des utilisateurs -->
<table id="userTable">
    <thead>
        <tr>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Post</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->lastname }}</td>
            <td>{{ $user->firstname }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->post }}</td>
            <td>
                <a href="{{ route('edit_user', ['id' => $user->id]) }}" class="btn">✏️ Modifier</a>                <button class="btn" onclick="deleteUser({{ $user->id }})">🗑️ Supprimer</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
  
 
    



  

    <!-- Modal Modifier Utilisateur -->
    <!--<div class="overlay" id="editUserModal">
        <div class="modal">
            <h2>📝 Modifier Utilisateur</h2>
            <form id="editUserForm">
             
                <div class="form-group">
                    <label for="editFirstname">Prénom</label>
                    <input type="text" id="editFirstname" name="firstname" required>
                </div>
                <div class="form-group">
                    <label for="editLastname">Nom</label>
                    <input type="text" id="editLastname" name="lastname" required>
                </div>
                <div class="form-group">
                    <label for="editEmail">Email</label>
                    <input type="email" id="editEmail" name="email" required>
                </div>
                <div class="form-group">
                    <label for="editPhone">Téléphone</label>
                    <input type="tel" id="editPhone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="editPost">Poste</label>
                    <input type="text" id="editPost" name="post" required>
                </div>
                
            </form>
            <button class="close-btn" onclick="closeModal('editUserModal')">❌ Annuler</button>
        </div>
    </div>-->

    <!-- Modal Recherche Utilisateur -->
    <div class="overlay" id="searchUserModal">
        <div class="modal">
            <h2>🔍 Chercher Utilisateur</h2>
            <form id="searchForm">
                <div class="form-group">
                    <label for="searchFirstname">Prénom</label>
                    <input type="text" id="searchFirstname" name="firstname">
                </div>
                
                <div class="form-group">
                    <button type="submit">🔎 Rechercher</button>
                </div>
            </form>
            <button class="close-btn" onclick="closeModal('searchUserModal')">❌ Annuler</button>
        </div>
    </div>

    <script>
        // Ouvrir le modal Ajouter
        function openAddModal() {
          document.getElementById('addUserModal').classList.add('active');
        }

        // Ouvrir le modal Modifier
        function openEditModal(firstname, lastname, email, phone, post) {
            document.getElementById('editFirstname').value = firstname;
            document.getElementById('editLastname').value = lastname;
            document.getElementById('editEmail').value = email;
            document.getElementById('editPhone').value = phone;
            document.getElementById('editPost').value = post;
            document.getElementById('editUserModal').classList.add('active');
        }

        // Ouvrir le modal Recherche
        function openSearchModal() {
            document.getElementById('searchUserModal').classList.add('active');
        }

        // Fermer les modals
        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
        }

        // Suppression utilisateur
        function deleteUser() {
            if (confirm("❌ Êtes-vous sûr de vouloir supprimer cet utilisateur ?")) {
                alert("Utilisateur supprimé !");
            }
        }
        
    </script>

</body>
</html>
