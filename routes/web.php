<?php

use App\Http\Controllers\PersonasController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/personas');
Route::get('/personas', [PersonasController::class, 'listPersonas']);
Route::get('/personas/new', [PersonasController::class, 'createPersona']);

// Route::get('/', [PersonaController::class, 'index']);

// Route::get('/agregar', [PersonaController::class, 'mostrarFormularioAgregar']);
// Route::post('/agregar', [PersonaController::class, 'agregar']);

// Route::get('/{rfc}', [PersonaController::class, 'recuperar']);
// Route::post('/{rfc}', [PersonaController::class, 'editar']);
// Route::delete('/{rfc}', [PersonaController::class, 'eliminar']);
