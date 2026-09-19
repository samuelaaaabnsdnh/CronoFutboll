<?php

namespace App\Interfaces;

use Carbon\Carbon;

interface TorneoInterface
{
    public function getAll();

    public function getById(int $id);

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);

    public function getByEstado(string $estado);

    public function getByCategoria(string $categoria);

    public function getByFechaInicio(Carbon $fecha_inicio);
}
