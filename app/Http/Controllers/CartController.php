<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;
use App\Models\CartItem;
use App\Models\UserGame;

class CartController extends Controller
{
    private function getDefaultUser()
    {
        return User::firstOrCreate(
            ['email' => 'user@example.com'],
            ['name' => 'Default User', 'password' => bcrypt('password')]
        );
    }

    public function index()
    {
        $user = $this->getDefaultUser();
        $cartItems = $user->cartItems()->with('game')->get();
        $total = $cartItems->sum(function($item) {
            return $item->game->price;
        });
        
        return view('cart', compact('cartItems', 'total'));
    }

    public function add(Game $game)
    {
        $user = $this->getDefaultUser();
        
        // Vérifier si le jeu n'est pas déjà dans le panier
        $existingCartItem = CartItem::where('user_id', $user->id)
                                   ->where('game_id', $game->id)
                                   ->first();
                                   
        if (!$existingCartItem) {
            CartItem::create([
                'user_id' => $user->id,
                'game_id' => $game->id
            ]);
        }
        
        return redirect()->back()->with('success', 'Jeu ajouté au panier !');
    }

    public function remove(CartItem $cartItem)
    {
        $cartItem->delete();
        return redirect()->back()->with('success', 'Jeu retiré du panier !');
    }

    public function purchase()
    {
        $user = $this->getDefaultUser();
        $cartItems = $user->cartItems;
        
        foreach ($cartItems as $cartItem) {
            // Ajouter à la bibliothèque
            UserGame::create([
                'user_id' => $user->id,
                'game_id' => $cartItem->game_id,
                'purchased_at' => now()
            ]);
            
            // Supprimer du panier
            $cartItem->delete();
        }
        
        return redirect()->route('library')->with('success', 'Achat effectué ! Jeux ajoutés à votre bibliothèque.');
    }
}
