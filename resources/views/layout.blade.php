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
        
        .card {
            background-color: #2a475e;
            border: 1px solid #495057;
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
        
        .game-card {
            transition: transform 0.2s;
        }
        
        .game-card:hover {
            transform: translateY(-5px);
        }
        
        .price {
            color: #beee11;
            font-weight: bold;
        }
    </style>
</head>
<body>
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
                {{ session('success') }}
            </div>
        @endif
        
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
