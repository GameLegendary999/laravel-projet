@extends('layout')

@section('title', 'Bibliothèque')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="mb-4">📚 Ma Bibliothèque</h1>
        <p class="lead">Vos jeux achetés.</p>
    </div>
</div>

@if($ownedGames->count() > 0)
<div class="row">
    @foreach($ownedGames as $game)
    <div class="col-md-4 mb-4">
        <div class="card game-card h-100">
            @if($game->image)
                <div class="game-card-bg" style="background-image: url('{{ asset('images/games/' . $game->image) }}');"></div>
            @endif
            <div class="game-card-content">
                <h5 class="card-title">{{ $game->name }}</h5>
                <p class="card-text">{{ Str::limit($game->description, 100) }}</p>
                <div class="mb-2">
                    <span class="badge bg-info">{{ $game->genre }}</span>
                </div>
                <div class="text-muted">
                    <small>Acheté le {{ \Carbon\Carbon::parse($game->pivot->purchased_at)->format('d/m/Y') }}</small>
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary btn-sm w-100">
                        🎮 Jouer
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="row">
    <div class="col-12 text-center">
        <div class="card">
            <div class="card-body">
                <h3>Bibliothèque vide</h3>
                <p>Vous n'avez aucun jeu dans votre bibliothèque.</p>
                <a href="{{ route('store') }}" class="btn btn-primary">Aller au Store</a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
