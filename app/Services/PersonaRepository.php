<?php

namespace App\Services;

use App\Models\Persona as PersonaModel;
use App\Entities\Persona as PersonaEntity;
use App\Entities\Domicilio as DomicilioEntity;
use Illuminate\Pagination\LengthAwarePaginator;

readonly class PersonaRepository
{
    public function __construct(
        private PersonaModel $personaModel,
    )
    {
    }

    public function getAll(): LengthAwarePaginator
    {
        $paginator = $this->personaModel::with('domicilio')
            ->orderBy('personas.rfc')
            ->paginate(16);

        $paginator->setCollection($paginator->getCollection()->map(function (PersonaModel $m) {
            $d = $m->domicilio;

            return new PersonaEntity(
                $m->rfc,
                $m->nombre,
                new DomicilioEntity(
                    $d->calle,
                    $d->numero,
                    $d->colonia,
                    $d->cp
                )
            );
        }));

        return $paginator;
    }

    public function getByRFC(string $rfc): ?PersonaEntity
    {
        $m = $this->personaModel::with('domicilio')
            ->select('*')
            ->where('rfc', $rfc)
            ->first();

        if ($m == null)
            return null;

        $d = $m->domicilio;

        return new PersonaEntity(
            $m->rfc,
            $m->nombre,
            new DomicilioEntity(
                $d->calle,
                $d->numero,
                $d->colonia,
                $d->cp
            )
        );
    }

    public function delete(string $rfc): bool
    {
        return PersonaModel::destroy($rfc) == 1;
    }

}
