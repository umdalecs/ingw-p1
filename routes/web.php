<?php

use App\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PersonaController::class, 'index']);
Route::get('/new', [PersonaController::class, 'personaForm']);
Route::get('/{rfc}', [PersonaController::class, 'personaForm']);

Route::post('/', [PersonaController::class, 'crearPersona']);
Route::patch('/{rfc}', [PersonaController::class, 'modificarPersona']);
Route::delete('/{rfc}', [PersonaController::class, 'borrarPersona']);
