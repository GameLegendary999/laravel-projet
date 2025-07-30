@extends('layout')

@section('title', 'Panier')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="mb-4">🛒 Mon Panier</h1>
    </div>
</div>

@if($cartItems->count() > 0)
<div class="row">
    <div class="col-md-8">
        @foreach($cartItems as $cartItem)
        <div class="card mb-3">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h5 class="card-title mb-1">{{ $cartItem->game->name }}</h5>
                        <span class="badge bg-info">{{ $cartItem->game->genre }}</span>
                    </div>
                    <div class="col-md-3 text-center">
                        <span class="price fs-5">{{ number_format($cartItem->game->price, 2) }}€</span>
                    </div>
                    <div class="col-md-3 text-end">
                        <form action="{{ route('cart.remove', $cartItem) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                🗑️ Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Résumé de la commande</h5>
                <hr>
                <div class="d-flex justify-content-between mb-2">
                    <span>Nombre d'articles:</span>
                    <span>{{ $cartItems->count() }}</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <strong>Total:</strong>
                    <strong class="price fs-4">{{ number_format($total, 2) }}€</strong>
                </div>
                <form action="{{ route('cart.purchase') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success w-100 btn-lg">
                        💳 Acheter maintenant
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-12 text-center">
        <div class="card">
            <div class="card-body">
                <h3>Panier vide</h3>
                <p>Votre panier est vide. Ajoutez des jeux depuis le store !</p>
                <a href="{{ route('store') }}" class="btn btn-primary">Aller au Store</a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
