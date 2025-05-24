<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Veterinary\VeterinariasController;
use App\Http\Controllers\Veterinary\ServiciosController;
use App\Http\Controllers\Pets\ProductosController;
use App\Http\Controllers\Pets\NosotrosController;


Route::middleware(['auth'])->group(function () {

    
    
        // Rutas para veterinarias
    Route::resource('veterinarias', VeterinariasController::class);

    // Rutas para servicios
    Route::resource('servicios', ServiciosController::class);

    // Rutas para productos
    Route::resource('productos', ProductosController::class);
    Route::post('/productos/{id}/deactivate', [ProductosController::class, 'deactivate'])->name('productos.deactivate');
    Route::post('/productos/{id}/activate', [ProductosController::class, 'activate'])->name('productos.activate');


    
    
    
});
