<?php

namespace App\Interfaces;

use App\Models\EstadisticasJugadores;
use Illuminate\Database\Eloquent\Collection;

interface EstadisticaJugadorRepositoryInterface
{
    public function all(): Collection;

    public function find(int $id): ?EstadisticasJugadores;

    public function create(array $data): EstadisticasJugadores;

    public function update(int $id, array $data): ?EstadisticasJugadores;

    public function delete(int $id): bool;
}