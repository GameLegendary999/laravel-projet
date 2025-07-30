<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Steam-like - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1b2838;
            color: #c7d5e0;
            font-family: Arial, sans-serif;
        }
        
        .navbar {
            background-color: #171a21 !important;
            border-bottom: 1px solid #316282;
        }
        
        .navbar-brand, .nav-link {
            color: #c7d5e0 !important;
        }
        
        .nav-link:hover {
            color: #66c0f4 !important;
        }
        
        /* Styles spécifiques pour Cart et Library pour améliorer la visibilité */
        .nav-link[href*="cart"], 
        .nav-link[href*="library"] {
            color: #f0f8ff !important;
            font-weight: 500;
        }
        
        .nav-link[href*="cart"]:hover, 
        .nav-link[href*="library"]:hover {
            color: #66c0f4 !important;
        }
        
        .card {
            background-color: #2a475e;
            border: 1px solid #495057;
        }
        
        .card-title {
            color: #f5f5f0 !important;
        }
        
        .card-text {
            color: #e8e8e3 !important;
        }
        
        .btn-primary {
            background-color: #5c7cfa;
            border-color: #5c7cfa;
        }
        
        .btn-primary:hover {
            background-color: #4dabf7;
            border-color: #4dabf7;
        }
        
        .btn-success {
            background-color: #51cf66;
            border-color: #51cf66;
        }
        
        .btn-danger {
            background-color: #ff6b6b;
            border-color: #ff6b6b;
        }
        
        .price {
            color: #beee11;
            font-weight: bold;
        }
        
        /* Styles pour le modal Steam authentique */
        .game-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            z-index: 1000;
            backdrop-filter: blur(3px);
        }
        
        .game-modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: linear-gradient(135deg, #2a3f54 0%, #1e2a3a 100%);
            border: 1px solid #4a5568;
            border-radius: 3px;
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.8);
            max-width: 800px;
            width: 90%;
            max-height: 85vh;
            overflow: hidden;
        }
        
        .game-modal-header {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            padding: 12px 20px;
            border-bottom: 1px solid #4a5568;
            position: relative;
        }
        
        .game-modal-close {
            position: absolute;
            top: 8px;
            right: 12px;
            color: #a0aec0;
            font-size: 16px;
            cursor: pointer;
            width: 28px;
            height: 28px;
            text-align: center;
            line-height: 28px;
            border-radius: 2px;
            transition: all 0.2s;
            background: rgba(255, 255, 255, 0.1);
        }
        
        .game-modal-close:hover {
            background: #e53e3e;
            color: white;
        }
        
        .game-modal-controls {
            position: absolute;
            top: 8px;
            right: 50px;
            display: flex;
            gap: 2px;
        }
        
        .game-modal-control {
            width: 28px;
            height: 28px;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: #a0aec0;
            cursor: pointer;
            border-radius: 2px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }
        
        .game-modal-control:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }
        
        .game-modal-title {
            color: #ffffff;
            font-size: 20px;
            font-weight: 400;
            margin: 0;
            margin-right: 120px;
        }
        
        .game-modal-subtitle {
            color: #66c0f4;
            font-size: 11px;
            margin-top: 2px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .game-modal-body {
            padding: 20px;
            max-height: calc(85vh - 120px);
            overflow-y: auto;
            background: linear-gradient(135deg, #2a3f54 0%, #1e2a3a 100%);
        }
        
        .game-modal-price-container {
            background: linear-gradient(90deg, #5a7c47 0%, #6b8c2a 100%);
            padding: 12px 16px;
            border-radius: 2px;
            display: inline-block;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }
        
        .game-modal-price {
            color: #b8d334;
            font-size: 18px;
            font-weight: bold;
            margin: 0;
        }
        
        .game-section {
            margin-bottom: 25px;
        }
        
        .game-section-header {
            color: #66c0f4;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
            padding-bottom: 4px;
            border-bottom: 1px solid #4a5568;
        }
        
        .game-section-content {
            color: #cbd5e0;
            line-height: 1.6;
            font-size: 13px;
        }
        
        .game-features-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .game-features-list li {
            color: #cbd5e0;
            font-size: 13px;
            line-height: 1.5;
            margin-bottom: 6px;
            padding-left: 12px;
            position: relative;
        }
        
        .game-features-list li:before {
            content: "•";
            color: #66c0f4;
            position: absolute;
            left: 0;
        }
        
        .game-modal-actions {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            padding: 15px 20px;
            border-top: 1px solid #4a5568;
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }
        
        .btn-steam-green {
            background: linear-gradient(135deg, #5a7c47 0%, #4f6f3f 100%);
            border: 1px solid #4f6f3f;
            color: #b8d334;
            padding: 8px 16px;
            border-radius: 2px;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all 0.2s;
            font-weight: 500;
        }
        
        .btn-steam-green:hover {
            background: linear-gradient(135deg, #6b8c2a 0%, #5a7c47 100%);
            color: #b8d334;
            transform: translateY(-1px);
        }
        
        .btn-steam-disabled {
            background: linear-gradient(135deg, #4a5568 0%, #2d3748 100%);
            border: 1px solid #4a5568;
            color: #a0aec0;
            padding: 8px 16px;
            border-radius: 2px;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            cursor: not-allowed;
        }
        
        .game-card {
            transition: transform 0.2s;
            position: relative;
            overflow: hidden;
            min-height: 250px;
            cursor: pointer;
        }
        
        .game-card:hover {
            transform: translateY(-5px);
        }
        
        .game-card-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.5;
            z-index: 1;
        }
        
        .game-card-content {
            position: relative;
            z-index: 2;
            background: rgba(42, 71, 94, 0.75);
            backdrop-filter: blur(1px);
            height: 100%;
            padding: 1rem;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <!-- Modal Steam authentique pour les détails du jeu -->
    <div id="gameModal" class="game-modal">
        <div class="game-modal-content">
            <div class="game-modal-header">
                <div class="game-modal-controls">
                    <button class="game-modal-control">▲</button>
                    <button class="game-modal-control">▼</button>
                </div>
                <span class="game-modal-close">✕</span>
                <h2 id="modalTitle" class="game-modal-title"></h2>
                <div class="game-modal-subtitle">DÉTAILS DU JEU</div>
            </div>
            
            <div class="game-modal-body">
                <div class="game-modal-price-container">
                    <div id="modalPrice" class="game-modal-price"></div>
                </div>
                
                <div class="game-section">
                    <div class="game-section-header">[ DESCRIPTION ]</div>
                    <div id="modalDescription" class="game-section-content"></div>
                </div>
                
                <div class="game-section">
                    <div class="game-section-header">[ CARACTÉRISTIQUES ]</div>
                    <ul class="game-features-list">
                        <li>Graphismes haute définition</li>
                        <li>Multijoueur en ligne</li>
                        <li>Mode solo immersif</li>
                        <li>Système de succès intégré</li>
                        <li>Support manette recommandé</li>
                    </ul>
                </div>
                
                <div class="game-section">
                    <div class="game-section-header">[ CONFIGURATION REQUISE ]</div>
                    <div class="game-section-content">
                        <strong>Minimum :</strong><br>
                        OS: Windows 10 64-bit<br>
                        Processeur: Intel Core i5-4590 / AMD FX 8350<br>
                        Mémoire vive: 8 GB de mémoire<br>
                        Graphiques: NVIDIA GTX 970 / AMD R9 290<br>
                        Espace disque: 25 GB d'espace disque disponible
                    </div>
                </div>
            </div>
            
            <div class="game-modal-actions">
                <div id="modalActions">
                    <!-- Les boutons d'action seront ajoutés ici -->
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">🎮 Steam-like</a>
            
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
                <a class="nav-link" href="{{ route('store') }}">Store</a>
                <a class="nav-link" href="{{ route('library') }}">Library</a>
                <a class="nav-link" href="{{ route('cart') }}">Cart</a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">
                {!! nl2br(e(session('success'))) !!}
            </div>
        @endif
        
        @if(session('warning'))
            <div class="alert alert-warning">
                {!! nl2br(e(session('warning'))) !!}
            </div>
        @endif
        
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Gestion du modal de détails du jeu
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('gameModal');
            const closeBtn = document.querySelector('.game-modal-close');
            
            // Fermer le modal
            closeBtn.addEventListener('click', function() {
                modal.style.display = 'none';
            });
            
            // Fermer le modal en cliquant à l'extérieur
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.style.display = 'none';
                }
            });
            
            // Fermer le modal avec la touche Escape
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    modal.style.display = 'none';
                }
            });
        });
        
        // Fonction pour afficher les détails du jeu
        function showGameDetails(title, price, description, gameId, inLibrary = false) {
            const modal = document.getElementById('gameModal');
            const modalTitle = document.getElementById('modalTitle');
            const modalPrice = document.getElementById('modalPrice');
            const modalDescription = document.getElementById('modalDescription');
            const modalActions = document.getElementById('modalActions');
            
            modalTitle.textContent = title;
            modalPrice.textContent = price + '€';
            modalDescription.textContent = description || 'Découvrez ce jeu passionnant avec des graphismes époustouflants et un gameplay immersif qui vous tiendra en haleine pendant des heures.';
            
            // Vider les actions précédentes
            modalActions.innerHTML = '';
            
            // Ajouter les boutons appropriés
            if (inLibrary) {
                modalActions.innerHTML = '<button class="btn-steam-disabled">Déjà dans votre bibliothèque</button>';
            } else {
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
                modalActions.innerHTML = `
                    <form method="POST" action="/cart/add/${gameId}" style="display: inline;">
                        <input type="hidden" name="_token" value="${csrfToken}">
                        <button type="submit" class="btn-steam-green">Ajouter au panier</button>
                    </form>
                `;
            }
            
            modal.style.display = 'block';
        }
    </script>
</body>
</html>
