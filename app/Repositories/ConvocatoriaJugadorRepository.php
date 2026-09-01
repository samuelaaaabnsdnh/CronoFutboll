<?php

namespace App\Repositories;

use App\Interfaces\ConvocatoriaJugadorRepositoryInterface;
use App\Models\ConvocatoriaJugadores;
use Illuminate\Database\Eloquent\Collection;

class ConvocatoriaJugadorRepository implements ConvocatoriaJugadorRepositoryInterface
{
    public function all(): Collection
    {
        return ConvocatoriaJugadores::all();
    }

    public function find(int $id): ?ConvocatoriaJugadores
    {
        return ConvocatoriaJugadores::find($id);
    }

    public function create(array $data): ConvocatoriaJugadores
    {
        return ConvocatoriaJugadores::create($data);
    }

    public function update(int $id, array $data): ?ConvocatoriaJugadores
    {
        $registro = ConvocatoriaJugadores::find($id);

        if (! $registro) {
            return null;
        }

        $registro->update($data);

        return $registro;
    }

    public function delete(int $id): bool
    {
        $registro = ConvocatoriaJugadores::find($id);

        if (! $registro) {
            return false;
        }

        return (bool) $registro->delete();
    }
}