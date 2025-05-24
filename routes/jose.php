<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Veterinary\VeterinariasController;
use App\Http\Controllers\Veterinary\ServiciosController;
use App\Http\Controllers\Veterinary\ProductosController;


Route::middleware(['auth'])->group(function () {

    
    
    Route::resource('veterinarias', VeterinariasController::class);
    Route::resource('servicios', ServiciosController::class);
    Route::Resource('productos', ProductosController::class);
    
    
});
