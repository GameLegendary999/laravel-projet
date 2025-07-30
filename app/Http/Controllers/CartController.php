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
        
        $alreadyOwned = [];
        $purchased = [];
        
        foreach ($cartItems as $cartItem) {
            // Vérifier si le jeu est déjà dans la library
            $existingUserGame = UserGame::where('user_id', $user->id)
                                       ->where('game_id', $cartItem->game_id)
                                       ->first();
            
            if ($existingUserGame) {
                // Jeu déjà possédé
                $alreadyOwned[] = $cartItem->game->name;
                $cartItem->delete(); // Supprimer du panier quand même
            } else {
                // Ajouter à la bibliothèque
                UserGame::create([
                    'user_id' => $user->id,
                    'game_id' => $cartItem->game_id,
                    'purchased_at' => now()
                ]);
                
                $purchased[] = $cartItem->game->name;
                $cartItem->delete();
            }
        }
        
        // Préparer les messages
        $messages = [];
        if (!empty($purchased)) {
            $messages[] = '✅ Jeux achetés avec succès : ' . implode(', ', $purchased);
        }
        if (!empty($alreadyOwned)) {
            foreach ($alreadyOwned as $gameName) {
                $messages[] = '⚠️ Le jeu : ' . $gameName . ' est déjà dans votre library';
            }
        }
        
        if (empty($messages)) {
            $message = 'Aucun jeu à acheter.';
        } else {
            $message = implode("\n", $messages);
        }
        
        return redirect()->route('library')->with('success', $message);
    }
}
