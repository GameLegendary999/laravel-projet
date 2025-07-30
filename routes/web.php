<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\CartController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/store', [StoreController::class, 'index'])->name('store');
Route::get('/library', [LibraryController::class, 'index'])->name('library');
Route::get('/cart', [CartController::class, 'index'])->name('cart');

// Routes pour ajouter/supprimer du panier
Route::post('/cart/add/{game}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');

// Route pour acheter (transférer du panier vers la bibliothèque)
Route::post('/cart/purchase', [CartController::class, 'purchase'])->name('cart.purchase');
