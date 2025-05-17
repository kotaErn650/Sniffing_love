<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Veterinary\CitaController;


Route::middleware(['auth'])->group(function () {


     //Rutas Citas
 Route::resource('citas', CitaController::class);

    
});
