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
        return $this->getByField('ubicacion', "%{$ubicacion}%", 'like');
    }

    public function getByEstado(string $estado)
    {
        return $this->getByField('estado', $estado);
    }

    public function getByCapacidad(int $capacidad)
    {
        return $this->getByField('capacidad', $capacidad, '>=');
    }
}
