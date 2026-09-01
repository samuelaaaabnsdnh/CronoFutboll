<?php

namespace App\Repositories;

use App\Interfaces\PartidoRepositoryInterface;
use App\Models\Partidos;
use Illuminate\Database\Eloquent\Collection;

class PartidoRepository implements PartidoRepositoryInterface
{
    public function all(): Collection
    {
        return Partidos::all();
    }

    public function find(int $id): ?Partidos
    {
        return Partidos::find($id);
    }

    public function create(array $data): Partidos
    {
        return Partidos::create($data);
    }

    public function update(int $id, array $data): ?Partidos
    {
        $partido = Partidos::find($id);

        if (! $partido) {
            return null;
        }

        $partido->update($data);

        return $partido;
    }

    public function delete(int $id): bool
    {
        $partido = Partidos::find($id);

        if (! $partido) {
            return false;
        }

        return (bool) $partido->delete();
    }
}