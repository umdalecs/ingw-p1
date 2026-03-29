<?php

namespace App\Entities;

class Domicilio
{
    public private(set) string $calle {
        set => $this->$calle;
    }

    public private(set) string $numero {
        set => $this->$nuero;
    }
    public private(set) string $colonia {
        set => $this->$colonia;
    }
    public private(set) string $cp {
        set => $this->$cp;
    }

    public function __construct(
        string $calle,
        string $numero,
        string $colonia,
        string $cp
    ) {
        $this->$calle = $calle;
        $this->$numero = $numero;
        $this->$colonia = $colonia;
        $this->$cp = $cp;
    }
}
