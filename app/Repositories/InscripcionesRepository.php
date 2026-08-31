<?php

namespace App\Repositories;

use App\Interfaces\InscripcionesInterface;
use App\Models\Inscripciones;

class InscripcionRepository extends BaseRepository implements InscripcionesInterface
{
    public function __construct(Inscripciones $inscripcionModel)
    {
        parent::__construct($inscripcionModel);
    }

    public function getByTorneo(int $idTorneo)
    {
        $inscripcion = $this->model->where("torneo_id", $idTorneo)
                                    ->get();

        if ($inscripcion->isEmpty()) {
            return null;
        }
        return $inscripcion;
    }

    public function getByEquipo(int $idEquipo)
    {
        $inscripcion = $this->model->where("equipo_id", $idEquipo)
                                    ->get();

        if ($inscripcion->isEmpty()) {
            return null;
        }
        return $inscripcion;
    }

    public function getByEstado(string $estado)
    {
        $inscripcion = $this->model->where("estado", $estado)
                                    ->get();

        if ($inscripcion->isEmpty()) {
            return null;
        }
        return $inscripcion;
    }
}