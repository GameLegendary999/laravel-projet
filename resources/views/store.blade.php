@extends('layout')

@section('title', 'Store')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="mb-4">🛍️ Store</h1>
        <p class="lead">Découvrez et achetez de nouveaux jeux.</p>
    </div>
</div>

@if($games->count() > 0)
<div class="row">
    @foreach($games as $game)
    <div class="col-md-4 mb-4">
        <div class="card game-card h-100">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $game->name }}</h5>
                <p class="card-text flex-grow-1">{{ $game->description }}</p>
                <div class="mb-2">
                    <span class="badge bg-info">{{ $game->genre }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="price fs-5">{{ number_format($game->price, 2) }}€</span>
                    <form action="{{ route('cart.add', $game) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">
                            🛒 Ajouter au panier
                        </button>
                    </form>
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
                <p>Le catalogue est vide pour le moment.</p>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
