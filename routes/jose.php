<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Veterinary\VeterinariasController;

Route::middleware(['auth'])->group(function () {
    Route::get('/veterinarias', [VeterinariasController::class, 'index'])->name('veterinarias.index');
    //rutas para mis tablas
});
