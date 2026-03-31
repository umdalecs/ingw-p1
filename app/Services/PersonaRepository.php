<?php

namespace App\Services;

use App\Models\Persona as PersonaModel;
use App\Entities\Persona as PersonaEntity;
use App\Entities\Domicilio as DomicilioEntity;

readonly class PersonaRepository
{
  public function __construct(
    private PersonaModel $personaModel,
  ) {}

  public function getAll(): array
  {
    $data = $this->personaModel::with('domicilio')
      ->select('*')
      ->orderBy('personas.rfc')
      ->get();

    $personas = $data->map(function (PersonaModel $m) {
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
    });

    return $personas->all();
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
}
