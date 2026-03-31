<?php

namespace App\Services;

use App\Models\Persona as PersonaModel;
use App\Models\Domicilio as DomicilioModel;
use App\Dtos\PersonaDto;
use App\Dtos\DomicilioDto;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Throwable;

readonly class PersonaRepository
{
    public function __construct(
        private PersonaModel $personaModel,
    ) {}

    public function recuperarTodos(?string $filter): LengthAwarePaginator
    {
        $paginator = $this->personaModel::with('domicilio')
            ->when($filter, function ($query, $filter) {
                $query->where('rfc', 'LIKE', "%{$filter}%");
            })
            ->orderBy('personas.rfc')
            ->paginate(16);;

        $paginator->setCollection($paginator->getCollection()->map(function (PersonaModel $m) {
            $d = $m->domicilio;

            return new PersonaDto(
                $m->rfc,
                $m->nombre,
                new DomicilioDto(
                    $d->calle,
                    $d->numero,
                    $d->colonia,
                    $d->cp
                )
            );
        }));

        return $paginator;
    }

    public function recuperarPorRFC(string $rfc): ?PersonaDto
    {
        $m = $this->personaModel::with('domicilio')
            ->select('*')
            ->where('rfc', $rfc)
            ->first();

        if ($m == null)
            return null;

        $d = $m->domicilio;

        return new PersonaDto(
            $m->rfc,
            $m->nombre,
            new DomicilioDto(
                $d->calle,
                $d->numero,
                $d->colonia,
                $d->cp
            )
        );
    }

    public function agregarPersona(PersonaDto $personaDto): bool
    {
        try {
            DB::transaction(function () use ($personaDto) {
                $d = $personaDto->getDomicilio();

                $persona = PersonaModel::create([
                    'rfc' => $personaDto->getRfc(),
                    'nombre' => $personaDto->getNombre(),
                ]);

                $persona->domicilio()->create([
                    'calle' => $d->getCalle(),
                    'numero' => $d->getNumero(),
                    'colonia' => $d->getColonia(),
                    'cp' => $d->getCp(),
                ]);
            });
            return true;
        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }

    public function modificarPersona(PersonaDto $personaDto): bool
    {
        try {
            DB::transaction(function () use ($personaDto) {
                $personaModel = PersonaModel::with('domicilio')
                    ->find($personaDto->getRfc());

                $personaModel->update([
                    'nombre' => $personaDto->getNombre()
                ]);

                $d = $personaDto->getDomicilio();

                $personaModel->domicilio->update([
                    'calle' => $d->getCalle(),
                    'numero' => $d->getNumero(),
                    'colonia' => $d->getColonia(),
                    'cp' => $d->getCp(),
                ]);
            });
            return true;
        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }

    public function borrar(string $rfc): bool
    {
        return PersonaModel::destroy($rfc) == 1;
    }
}
