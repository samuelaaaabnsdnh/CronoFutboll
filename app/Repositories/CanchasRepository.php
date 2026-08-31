<?php

namespace App\Repositories;

use App\Interfaces\CanchaInterface;
use App\Models\Canchas;

class CanchaRepository extends BaseRepository implements CanchaInterface
{
    public function __construct(Canchas $canchaModel)
    {
        parent::__construct($canchaModel);
    }

    public function getByUbicacion(string $ubicacion)
    {
        $cancha = $this->model->where("ubicacion", "like", "%{$ubicacion}%")
                               ->get();

        if ($cancha->isEmpty()) {
            return null;
        }
        return $cancha;
    }

    public function getByEstado(string $estado)
    {
        $cancha = $this->model->where("estado", $estado)
                               ->get();

        if ($cancha->isEmpty()) {
            return null;
        }
        return $cancha;
    }

    public function getByCapacidad(int $capacidad)
    {
        $cancha = $this->model->where("capacidad", ">=", $capacidad)
                               ->get();

        if ($cancha->isEmpty()) {
            return null;
        }
        return $cancha;
    }
}