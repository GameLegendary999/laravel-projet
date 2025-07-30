@extends('layout')

@section('title', 'Accueil')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="mb-4">🏠 Bienvenue sur Steam-like</h1>
        <p class="lead">Découvrez les derniers jeux et gérez votre bibliothèque.</p>
    </div>
</div>

@if($featuredGames->count() > 0)
<div class="row">
    <div class="col-12">
        <h2 class="mb-4">✨ Jeux en vedette</h2>
    </div>
</div>

<div class="row">
    @foreach($featuredGames as $game)
    <div class="col-md-4 mb-4">
        <div class="card game-card h-100">
            <div class="card-body">
                <h5 class="card-title">{{ $game->name }}</h5>
                <p class="card-text">{{ Str::limit($game->description, 100) }}</p>
                <span class="badge bg-info">{{ $game->genre }}</span>
                <div class="mt-3">
                    <span class="price fs-5">{{ number_format($game->price, 2) }}€</span>
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
                <h3>Aucun jeu disponible</h3>
                <p>Ajoutez des jeux à votre catalogue pour commencer !</p>
                <a href="{{ route('store') }}" class="btn btn-primary">Aller au Store</a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
