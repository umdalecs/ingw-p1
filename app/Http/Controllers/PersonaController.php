<?php

namespace App\Http\Controllers;

use App\Services\PersonaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

use App\Dtos\PersonaDto;
use App\Dtos\DomicilioDto;
use App\Http\Requests\CreatePersonaRequest;
use App\Http\Requests\ModifyPersonaRequest;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function __construct(
        private readonly PersonaService $personaService
    ) {}

    public function listarPersonas(Request $request): View
    {
        $validated = $request->validate([
            'filter' => 'nullable|string|max:255'
        ]);

        $personas = $this->personaService->recuperarTodos($validated['filter'] ?? null);

        return view("index", [
            'personas' => $personas
        ]);
    }

    public function formularioPersonas(?string $rfc = null): View|RedirectResponse
    {
        if ($rfc == null)
            return view("personaForm");

        $persona = $this->personaService->recuperarPorRFC($rfc);

        if ($persona == null)
            return redirect("/")
                ->with('error', 'Persona no encontrada');

        return view("personaForm", [
            'persona' => $persona
        ]);
    }

    public function crearPersona(CreatePersonaRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $success = $this->personaService->agregarPersona(new PersonaDto(
            $validated['rfc'],
            $validated['nombre'],
            new DomicilioDto(
                $validated['calle'],
                $validated['numero'],
                $validated['colonia'],
                $validated['cp']
            )
        ));

        return $success
            ? redirect('/')->with('success', 'Persona creada exitosamente')
            : redirect('/')->with('error', 'Error al crear la persona');
    }

    public function modificarPersona(ModifyPersonaRequest $request, string $rfc): RedirectResponse
    {
        $validated = $request->validated();

        $success = $this->personaService->modificarPersona(new PersonaDto(
            $rfc,
            $validated['nombre'],
            new DomicilioDto(
                $validated['calle'],
                $validated['numero'],
                $validated['colonia'],
                $validated['cp']
            )
        ));

        return $success
            ? redirect('/')->with('success', 'Persona modificada exitosamente')
            : redirect('/')->with('error', 'Error al modificar persona');
    }

    public function borrarPersona(string $rfc): RedirectResponse
    {
        $result = $this->personaService->borrar($rfc);

        return $result
            ? redirect('/')->with('success', 'Persona eliminada exitosamente')
            : redirect('/')->with('error', 'Error al eliminar persona');
    }
}
