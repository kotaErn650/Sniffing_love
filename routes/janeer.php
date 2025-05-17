<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Health\CitaController; //llama sus ciontrtoladoeres aqui



    Route::middleware(['auth'])->group(function () {


     //Rutas Citas

 Route::resource('citas', CitaController::class);

    
});
