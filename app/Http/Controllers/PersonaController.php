<?php

namespace App\Http\Controllers;

use App\Services\PersonaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PersonaController extends Controller
{
    public function __construct(
        private readonly PersonaService $personaService
    ) {}

    public function index(): View
    {
        $personas = $this->personaService->getAll();

        return view("index", [
            'personas' => $personas
        ]);
    }

    public function personaForm(?string $rfc = null): View|RedirectResponse
    {
        if ($rfc == null)
            return view("personaForm"   );

        $persona = $this->personaService->getByRFC($rfc);

        if ($persona == null)
            return redirect("/")->with('error', 'Persona no encontrada');

        return view("personaForm", [
            'persona' => $persona
        ]);
    }

    public function crearPersona(): RedirectResponse
    {
        return redirect('/')->with('error', 'Error al crear la persona');
    }

    public function modificarPersona(): RedirectResponse
    {
        return redirect('/')->with('error', 'Error al modificar persona');
    }

    public function borrarPersona(string $rfc): RedirectResponse
    {
        $result = $this->personaService->delete($rfc);

        if (!$result)
            return redirect('/')->with('error', 'Error al eliminar persona');

        return redirect('/')->with('success', 'Persona eliminada exitosamente');
    }
}
