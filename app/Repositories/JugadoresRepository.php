<?php

namespace App\Repositories;

use App\Interfaces\JugadoresInterface;
use App\Models\Jugadores;

class JugadorRepository extends BaseRepository implements JugadoresInterface
{
    public function __construct(Jugadores $jugadorModel)
    {
        parent::__construct($jugadorModel);
    }

    public function getByDocumento(string $documento)
    {
        $jugador = $this->model->where("documento", $documento)
                                ->get();

        if ($jugador->isEmpty()) {
            return null;
        }
        return $jugador;
    }

    public function getByPosicion(string $posicion)
    {
        $jugador = $this->model->where("posicion", $posicion)
                                ->get();

        if ($jugador->isEmpty()) {
            return null;
        }
        return $jugador;
    }

    public function getByEstado(string $estado)
    {
        $jugador = $this->model->where("estado", $estado)
                                ->get();

        if ($jugador->isEmpty()) {
            return null;
        }
        return $jugador;
    }
}