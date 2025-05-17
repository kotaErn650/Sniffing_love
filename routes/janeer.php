<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Health\CitaController;

Route::resource('citas', CitaController::class);
