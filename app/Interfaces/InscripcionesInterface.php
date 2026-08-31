<?php

namespace App\Repositories\Interfaces;

interface InscripcionRepositoryInterface extends BaseRepositoryInterface
{
    public function getByTorneo(int $idTorneo);
    public function getByEquipo(int $idEquipo);
    public function getByEstado(string $estado);
}