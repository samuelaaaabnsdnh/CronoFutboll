<?php

namespace App\Repositories;

use App\Interfaces\EstadisticaJugadorRepositoryInterface;
use App\Models\EstadisticasJugadores;
use Illuminate\Database\Eloquent\Collection;

class EstadisticaJugadorRepository implements EstadisticaJugadorRepositoryInterface
{
    public function all(): Collection
    {
        return EstadisticasJugadores::all();
    }

    public function find(int $id): ?EstadisticasJugadores
    {
        return EstadisticasJugadores::find($id);
    }

    public function create(array $data): EstadisticasJugadores
    {
        return EstadisticasJugadores::create($data);
    }

    public function update(int $id, array $data): ?EstadisticasJugadores
    {
        $estadistica = EstadisticasJugadores::find($id);

        if (! $estadistica) {
            return null;
        }

        $estadistica->update($data);

        return $estadistica;
    }

    public function delete(int $id): bool
    {
        $estadistica = EstadisticasJugadores::find($id);

        if (! $estadistica) {
            return false;
        }

        return (bool) $estadistica->delete();
    }
}