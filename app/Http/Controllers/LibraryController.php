<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LibraryController extends Controller
{
    public function index()
    {
        // Pour l'instant, on utilise l'utilisateur avec l'ID 1
        $user = User::firstOrCreate(
            ['email' => 'user@example.com'],
            ['name' => 'Default User', 'password' => bcrypt('password')]
        );
        
        $ownedGames = $user->ownedGames;
        return view('library', compact('ownedGames'));
    }
}
