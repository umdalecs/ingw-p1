<?php

namespace App\Services;

use App\Entities\Persona as PersonaEntity;
use Illuminate\Pagination\LengthAwarePaginator;

readonly class PersonaService
{
  public function __construct(
    private PersonaRepository $repo,
  ) {}

  public function getAll(): LengthAwarePaginator
  {
    return $this->repo->getAll();
  }

  public function getByRFC(string $rfc): ?PersonaEntity
  {
    return $this->repo->getByRFC($rfc);
  }

  public function delete(string $rfc): bool
  {
      return $this->repo->delete($rfc);
  }
}
