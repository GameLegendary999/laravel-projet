<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\UserGame;

try {
    $count = UserGame::count();
    echo "Nombre de jeux dans la library: " . $count . "\n";
    
    if ($count > 0) {
        UserGame::truncate();
        echo "✅ Library vidée ! Tous les jeux ont été supprimés de la library.\n";
    } else {
        echo "✅ Library déjà vide.\n";
    }
    
} catch (Exception $e) {
    echo "❌ Erreur: " . $e->getMessage() . "\n";
}
