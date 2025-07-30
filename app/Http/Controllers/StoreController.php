<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class StoreController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('store', compact('games'));
    }
}
