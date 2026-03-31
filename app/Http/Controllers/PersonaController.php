<?php

namespace App\Http\Controllers;

use App\Services\PersonaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PersonaController extends Controller
{
    public function __construct(
        private PersonaService $personaService
    ) {}

    public function index(): View
    {
        $personas = $this->personaService->getAll();


        return view("index", [
            'personas' => $personas
        ]);
    }

    public function createPersona(): View
    {
        return view("personaForm");
    }

    public function editPersona(string $rfc): View|RedirectResponse
    {
        $persona = $this->personaService->getByRFC($rfc);

        if ($persona == null)
            return redirect("/")->with('error', 'Persona no encontrada');

        return view("personaForm", [
            'persona' => $persona
        ]);
    }
}
