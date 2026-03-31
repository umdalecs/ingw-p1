<?php

namespace App\Entities;

class Persona
{
    public function __construct(
        private string $rfc,
        private string $nombre,
        private Domicilio $domicilio
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
