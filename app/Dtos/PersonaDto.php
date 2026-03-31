<?php

namespace App\Dtos;

class PersonaDto
{
    public function __construct(
        private string $rfc,
        private string $nombre,
        private DomicilioDto $domicilio
    ) {}

    public function getRfc()
    {
        return $this->rfc;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDomicilio()
    {
        return $this->domicilio;
    }
}
