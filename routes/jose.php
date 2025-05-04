<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeterinariasController;

Route::middleware(['auth'])->prefix('jose')->name('jose.')->group(function () {
    // Ruta para listar veterinarias
    Route::get('/veterinarias', [VeterinariasController::class, 'index'])->name('veterinarias.index');

    //rutas para mis tablas
});
