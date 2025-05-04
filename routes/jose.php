<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Veterinary\VeterinariasController;

Route::middleware(['auth'])->group(function () {
    Route::resource('veterinarias', VeterinariasController::class);


    //rutas para mis tablas
});
