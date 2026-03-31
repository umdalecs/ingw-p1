<?php

use App\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PersonaController::class, 'index']);
Route::get('/new', [PersonaController::class, 'createPersona']);
Route::get('/{rfc}', [PersonaController::class, 'editPersona']);
