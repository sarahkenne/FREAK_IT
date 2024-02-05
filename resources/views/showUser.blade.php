<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Utilisateur</title>
</head>

<body>

    <div class="container mt-5">
        <h1>Détails de l'Utilisateur</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $user->name }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                <p class="card-text"><strong>Date de Naissance:</strong> {{ $user->birthdate }}</p>


                <a href="{{ route('edit', ['id' => $user->id]) }}" class="btn btn-warning">Modifier</a>
                <a href="{{ route('delete', ['id' => $user->id]) }}" class="btn btn-danger">Supprimer</a>
            </div>
        </div>

    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
