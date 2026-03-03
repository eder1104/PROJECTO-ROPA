<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('/lookbook', [ShopController::class, 'lookbook'])->name('lookbook');
Route::get('/cart', [ShopController::class, 'cart'])->name('cart.index');
Route::post('/cart/add', [ShopController::class, 'addToCart'])->name('cart.add');

require __DIR__.'/auth.php';
