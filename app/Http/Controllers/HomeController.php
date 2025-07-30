<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class HomeController extends Controller
{
    public function index()
    {
        $featuredGames = Game::latest()->take(6)->get();
        return view('home', compact('featuredGames'));
    }
}
