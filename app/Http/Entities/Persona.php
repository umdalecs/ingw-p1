<?php
namespace App\Entities;

class Persona {
    public private(set) string $rfc {
        set => $this->$rfc;
    }

    public private(set) string $nombre {
        set => $this->$nombre;
    }

    public private(set) Domicilio $domicilio {
        set => $this->$domicilio;
    }

    public function __construct(
        string $rfc,
        string $nombre,
        Domicilio $domicilio
    )
    {
        $this->rfc = $rfc;
        $this->nombre = $nombre;
        $this->domicilio = $domicilio;
    }
}
