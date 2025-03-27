<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Utilisateur</title>
</head>
<body>
<div class="overlay" id="addUserModal">
    <div class="modal">
        <h2>📝 Ajouter un Utilisateur</h2>
        <form action="{{ route('add_User') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" class="@error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required>
                @error('firstname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="lastname">Nom</label>
                <input type="text" id="lastname" class="@error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required>
                @error('lastname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">Téléphone</label>
                <input type="tel" id="phone" class="@error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="post">Poste</label>
                <input type="text" id="post" class="@error('post') is-invalid @enderror" name="post" value="{{ old('post') }}" required>
                @error('post')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" class="@error('password') is-invalid @enderror" name="password" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" id="password_confirmation" class="@error('password_confirmation') is-invalid @enderror" name="password_confirmation" required>
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit">✔️ Enregistrer</button>
            </div>
        </form>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>
</div>

</body>
</html>
