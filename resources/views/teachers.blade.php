<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Enseignants</title>
    <style>
        /* Votre CSS ici (identique à votre code original) */
    </style>
</head>
<body>

    <div class="container">
        <h1>📋 Gestion des Enseignants</h1>

        <!-- Boutons d'actions -->
        <button class="btn" onclick="openAddModal()">➕ Ajouter Enseignant</button>
        <button class="btn" onclick="openSearchModal()">🔍 Chercher Enseignant</button>

        <!-- Table des enseignants -->
        <table id="teacherTable">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Poste</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->lastname }}</td>
                    <td>{{ $teacher->firstname }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->phone }}</td>
                    <td>{{ $teacher->post }}</td>
                    <td>
                        <button class="btn">Modifier</button>
                        <button class="btn">Supprimer</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Vos modals et scripts JavaScript ici -->
</body>
</html>