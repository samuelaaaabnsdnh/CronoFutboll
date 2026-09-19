<?php

namespace App\Repositories;

use App\Interfaces\InscripcionInterface;
use App\Models\Inscripciones;

class InscripcionRepository extends BaseRepository implements InscripcionInterface
{
    public function __construct(Inscripciones $inscripcionModel)
    {
        parent::__construct($inscripcionModel);
    }

    public function getByTorneo(int $idTorneo)
    {
        return $this->getByField('torneo_id', $idTorneo);
    }

    public function getByEquipo(int $idEquipo)
    {
        return $this->getByField('equipo_id', $idEquipo);
    }

    public function getByEstado(string $estado)
    {
        return $this->getByField('estado', $estado);
    }
}
