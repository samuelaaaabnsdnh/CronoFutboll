<?php

namespace App\Interfaces;

interface InscripcionInterface extends BaseRepositoryInterface
{
    public function getByTorneo(int $idTorneo);

    public function getByEquipo(int $idEquipo);

    public function getByEstado(string $estado);
}
