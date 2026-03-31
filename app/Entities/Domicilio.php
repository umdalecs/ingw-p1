<?php

namespace App\Entities;

class Domicilio
{
    public function __construct(
        private string $calle,
        private string $numero,
        private string $colonia,
        private string $cp
    ) {}

    public function getCalle()
    {
        return $this->calle;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getColonia()
    {
        return $this->colonia;
    }

    public function getCp()
    {
        return $this->cp;
    }
}
