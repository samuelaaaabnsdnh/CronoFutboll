<?php

namespace App\Interfaces;

interface CanchaInterface extends BaseRepositoryInterface
{
    public function getByUbicacion(string $ubicacion);

    public function getByEstado(string $estado);

    public function getByCapacidad(int $capacidad);
}
