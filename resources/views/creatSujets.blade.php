@extends('dashboard')

@section('content')
    <div class="container">
        <h2>Ajouter un Sujet</h2>

        <form method="post" action="{{ route('sujets.store') }}">
            @csrf
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="category_id">Catégorie</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->titre }}</option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="user_id" value="{{ auth()->id() }}"> {{-- Récupération de l'ID de l'utilisateur authentifié --}}

            <button type="submit" class="btn btn-primary">Ajouter le Sujet</button>
        </form>
    </div>
@endsection
