<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Veterinary\VeterinariasController;
use App\Http\Controllers\Veterinary\ServiciosController;


Route::middleware(['auth'])->group(function () {
    Route::resource('veterinarias', VeterinariasController::class);


    //rutas para mis tablas
    Route::resource('servicios', ServiciosController::class);
    
});
