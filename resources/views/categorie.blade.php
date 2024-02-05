<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Catégories</title>
    <!-- Inclure les fichiers CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Liste des Catégories</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Descriptif</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $categorie)
            <tr>
                <td>{{ $categorie->id }}</td>
                <td>{{ $categorie->titre }}</td>
                <td>{{ $categorie->descriptif }}</td>
                <td>
                    <!-- Bouton Voir -->
                    <a href="{{ route('categories.show', $categorie) }}" class="btn btn-info btn-sm">Voir</a>
                    
                    <!-- Bouton Modifier -->
                    <a href="{{ route('categories.edit', $categorie) }}" class="btn btn-warning btn-sm">Modifier</a>
                    
                    <!-- Bouton Supprimer -->
                    <form action="{{ route('categories.destroy', $categorie) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie?')">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<!-- Inclure les fichiers JavaScript Bootstrap (facultatif) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
