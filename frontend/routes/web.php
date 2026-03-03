<?php

use App\Http\Controllers\TiendaController;
use App\Http\Controllers\PerfilController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TiendaController::class, 'inicio'])->name('tienda.inicio');
Route::get('/que-somos', [TiendaController::class, 'queSomos'])->name('que-somos');
Route::get('/carrito', [TiendaController::class, 'carrito'])->name('carrito.inicio');
Route::post('/carrito/agregar', [TiendaController::class, 'agregarAlCarrito'])->name('carrito.agregar');

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [PerfilController::class, 'edit'])->name('perfil.edit');
    Route::patch('/perfil', [PerfilController::class, 'update'])->name('perfil.update');
    Route::delete('/perfil', [PerfilController::class, 'destroy'])->name('perfil.destroy');
});

require __DIR__.'/auth.php';
