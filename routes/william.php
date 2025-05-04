<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UsuariosController;

Route::middleware(['auth'])->group(function () {
    Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
    //rutas para mis tablas
});
