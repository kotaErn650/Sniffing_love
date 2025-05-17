<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UsuariosController;
use App\Http\Controllers\Auth\RolesController;
use App\Http\Controllers\Auth\PoliticasController;
use App\Http\Controllers\Auth\AceptacionPoliticasController;
use App\Http\Controllers\Auth\NotificacionesController;
use App\Http\Controllers\Auth\PuntosRecompensaController;
use App\Http\Controllers\Auth\TransaccionesPuntosController;
use App\Http\Controllers\Auth\ReferidosController;
use App\Http\Controllers\Auth\MembresiasController;
use App\Http\Controllers\Auth\SuscripcionesMembresiasController;


    Route::middleware(['auth'])->group(function () {


    Route::resource('usuarios', UsuariosController::class);
    Route::resource('roles', RolesController::class);
    Route::resource('politicas', PoliticasController::class);
    Route::resource('aceptacionpoliticas', AceptacionPoliticasController::class);
    Route::resource('notificaciones', NotificacionesController::class);
    Route::resource('puntosrecompensa', PuntosRecompensaController::class);
    Route::resource('transaccionespuntos', TransaccionesPuntosController::class);
    Route::resource('referidos', ReferidosController::class);
    Route::resource('membresias', MembresiasController::class);
    Route::resource('suscripcionesmembresias', SuscripcionesMembresiasController::class);

    
});
