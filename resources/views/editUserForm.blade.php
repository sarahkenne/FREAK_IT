<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap CSS & JS -->
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    <!-- END Bootstrap -->

    <!-- additional CSS -->
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <!-- END additional CSS -->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Utilisateur</title>
</head>

<body>

    <div class="container mt-5">
        <h1>Modifier Utilisateur</h1>

        <!-- Formulaire de modification de l'utilisateur -->
        <form method="POST" action="{{ route('update', ['id' => $user->id]) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Pseudo</label>
                <input type="text" class="form-control" id="name" name="pseudo" value="{{ $user->pseudo }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>

            <div class="mb-3">
                <label for="birthdate" class="form-label">Date de Naissance</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $user->birthdate }}" required>
            </div>

            <div class="mb-3">
                <label for="banniere" class="form-label">Bannière</label>
                <input type="text" class="form-control" id="banniere" name="banniere" value="{{ $user->banniere }}">
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Rôle</label>
                <input type="text" class="form-control" id="role" name="role" value="{{ $user->role }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de Passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </form>

    </div>

</body>

</html>
