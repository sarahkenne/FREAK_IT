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
    <title>Liste des Utilisateurs</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">Forum</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">Acceuil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Manager') }}">Administration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Liste des Utilisateurs</h1>

        @if(session('success'))
        <div id="success-message" class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- est un petit script js pour gerer lla disparution du DOM crée par la reussite de l'action -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var successMessage = document.getElementById('success-message');
                if (successMessage) {
                    setTimeout(function() {
                        successMessage.style.display = 'none';
                    }, 3000);
                }
            });
        </script>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date de Naissance</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!--la boucle pour afficher la liste des utilisateurs -->
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->birthdate }}</td>
                    <td>

                        <a href="{{ route('show', ['id' => $user->id]) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('edit', ['id' => $user->id]) }}" class="btn btn-warning">Modifier</a>

                        <form action="{{ route('delete', ['id' => $user->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>

</html>
