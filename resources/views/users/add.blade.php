@extends('layouts.app')

@section('title', 'Ajouter un Utilisateur')

@section('content')
    <h1>➕ Ajouter un Utilisateur</h1>

    {{-- Afficher les erreurs de validation --}}
    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulaire d'ajout d'utilisateur --}}
    <form action="{{ route('addUser') }}" method="POST">
        @csrf

        <label for="lastname">📝 Nom :</label><br>
        <input type="text" id="lastname" name="lastname" required><br><br>

        <label for="firstname">📝 Prénom :</label><br>
        <input type="text" id="firstname" name="firstname" required><br><br>

        <label for="email">📧 Email :</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">📞 Téléphone :</label><br>
        <input type="text" id="phone" name="phone" required><br><br>

        <label for="post">💼 Poste :</label><br>
        <input type="text" id="post" name="post" required><br><br>

        <button type="submit" style="padding: 10px 20px; background-color: #0e0e0e; color: white; border: none; border-radius: 5px; cursor: pointer;">
            ➕ Ajouter
        </button>
    </form>
@endsection
