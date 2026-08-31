<?php

namespace App\Repositories\Interfaces;

interface CanchaRepositoryInterface extends BaseRepositoryInterface
{
    public function getByUbicacion(string $ubicacion);
    public function getByEstado(string $estado);
    public function getByCapacidad(int $capacidad);
}