@extends('dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        {{ $sujet->titre }}
    </div>
    <div class="card-body">
        <p>{{ $sujet->description }}</p>
    </div>
</div>

<div class="mt-3 card">
    <div class="card-header">
        Commentaires
    </div>
    <div class="card-body">
        @if($sujet->messages)
        @foreach($sujet->messages->sortByDesc('created_at') as $message)
    <div class="p-3 mb-4 border rounded" style="background-color: #f8f9fa;">
        <div class="media">
            <img class="mr-3 rounded-circle" src="{{ $message->user->profile_photo_url }}" alt="Photo de profil" width="50" height="50">
            <div class="media-body">
                <h5 class="mt-0">{{ $message->user->name }}</h5>
                <p>{{ $message->contenu }}</p>
                @if(auth()->id() == $message->user_id)
                    <form action="{{ route('messages.destroy', $message->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endforeach


        @endif

    </div>
    <div class="card-footer" >
    <form method="post" action="{{ route('messagesStore', ['id' => $sujet->id]) }}">
        <p>{{$sujet->id}}</p> test
    @csrf
    <div class="form-group">
        <textarea class="form-control" name="contenu" placeholder="Ajouter un commentaire" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Envoyer</button>
</form>
    </div>
</div>
@endsection
