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

    // Borrado definitivo: la tabla tiene UNIQUE(torneo_id, equipo_id), asi que un
    // soft delete impediria volver a inscribir al mismo equipo en el torneo.
    public function delete(int $id): bool
    {
        $registro = $this->model->find($id);

        if (! $registro) {
            return false;
        }

        return (bool) $registro->forceDelete();
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
