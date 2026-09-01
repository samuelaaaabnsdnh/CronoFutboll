<?php

namespace App\Repositories;

use App\Interfaces\ConvocatoriaRepositoryInterface;
use App\Models\Convocatorias;
use Illuminate\Database\Eloquent\Collection;

class ConvocatoriaRepository implements ConvocatoriaRepositoryInterface
{
    public function all(): Collection
    {
        return Convocatorias::all();
    }

    public function find(int $id): ?Convocatorias
    {
        return Convocatorias::find($id);
    }

    public function create(array $data): Convocatorias
    {
        return Convocatorias::create($data);
    }

    public function update(int $id, array $data): ?Convocatorias
    {
        $convocatoria = Convocatorias::find($id);

        if (! $convocatoria) {
            return null;
        }

        $convocatoria->update($data);

        return $convocatoria;
    }

    public function delete(int $id): bool
    {
        $convocatoria = Convocatorias::find($id);

        if (! $convocatoria) {
            return false;
        }

        return (bool) $convocatoria->delete();
    }
}