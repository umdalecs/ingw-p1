<?php

namespace App\Services;

use App\Entities\Persona as PersonaEntity;

readonly class PersonaService
{
  public function __construct(
    private PersonaRepository $repo,
  ) {}

  public function getAll(): array
  {
    return $this->repo->getAll();
  }

  public function getByRFC(string $rfc): ?PersonaEntity
  {
    return $this->repo->getByRFC($rfc);
  }
}
