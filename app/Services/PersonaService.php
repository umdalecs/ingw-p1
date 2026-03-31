<?php

namespace App\Services;

use App\Dtos\PersonaDto;
use Illuminate\Pagination\LengthAwarePaginator;

readonly class PersonaService
{
  public function __construct(
    private PersonaRepository $repo,
  ) {}

  public function recuperarTodos(): LengthAwarePaginator
  {
    return $this->repo->recuperarTodos();
  }

  public function recuperarPorRFC(string $rfc): ?PersonaDto
  {
    return $this->repo->recuperarPorRFC($rfc);
  }

  public function agregarPersona(PersonaDto $personaDto): bool
  {
    return $this->repo->agregarPersona($personaDto);
  }

  public function modificarPersona(PersonaDto $personaDto): bool
  {
    return $this->repo->modificarPersona($personaDto);
  }

  public function borrar(string $rfc): bool
  {
    return $this->repo->borrar($rfc);
  }
}
