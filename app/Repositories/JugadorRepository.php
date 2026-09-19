<?php

namespace App\Repositories;

use App\Interfaces\JugadorInterface;
use App\Models\Jugadores;

class JugadorRepository extends BaseRepository implements JugadorInterface
{
    public function __construct(Jugadores $jugadorModel)
    {
        parent::__construct($jugadorModel);
    }

    public function getByDocumento(string $documento)
    {
        return $this->getByField('documento', $documento);
    }

    public function getByPosicion(string $posicion)
    {
        return $this->getByField('posicion', $posicion);
    }

    public function getByEstado(string $estado)
    {
        return $this->getByField('estado', $estado);
    }
}
