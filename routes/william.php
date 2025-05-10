<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UsuariosController;
use App\Http\Controllers\Auth\RolesController;
use App\Http\Controllers\Auth\PoliticasController;

Route::middleware(['auth'])->group(function () {
    Route::resource('usuarios', UsuariosController::class);



    Route::resource('roles', RolesController::class);
    Route::resource('politicas', PoliticasController::class);

    
    //rutas para mis tablas
});
