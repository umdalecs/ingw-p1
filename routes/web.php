<?php

use App\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PersonaController::class, 'listarPersonas']);
Route::get('/new', [PersonaController::class, 'formularioPersonas']);
Route::get('/{rfc}', [PersonaController::class, 'formularioPersonas']);

Route::post('/', [PersonaController::class, 'crearPersona']);
Route::patch('/{rfc}', [PersonaController::class, 'modificarPersona']);
Route::delete('/{rfc}', [PersonaController::class, 'borrarPersona']);
