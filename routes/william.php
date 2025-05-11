<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UsuariosController;
use App\Http\Controllers\Auth\RolesController;
use App\Http\Controllers\Auth\PoliticasController;
use App\Http\Controllers\Auth\AceptacionPoliticasController;

    Route::middleware(['auth'])->group(function () {
        
    Route::resource('usuarios', UsuariosController::class);
    Route::resource('roles', RolesController::class);
    Route::resource('politicas', PoliticasController::class);
    Route::resource('aceptacionpoliticas', AceptacionPoliticasController::class);

    
    
});
