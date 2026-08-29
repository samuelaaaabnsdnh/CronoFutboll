<?php

namespace App\Repositories;

use App\Interfaces\PermisoRepositoryInterface;
use App\Models\Permiso;
use Illuminate\Database\Eloquent\Collection;

class PermisoRepository implements PermisoRepositoryInterface
{
    public function all(): Collection
    {
        return Permiso::all();
    }

    public function find(int $id): ?Permiso
    {
        return Permiso::find($id);
    }

    public function create(array $data): Permiso
    {
        return Permiso::create($data);
    }

    public function update(int $id, array $data): ?Permiso
    {
        $permiso = Permiso::find($id);

        if (! $permiso) {
            return null;
        }

        $permiso->update($data);

        return $permiso;
    }

    public function delete(int $id): bool
    {
        $permiso = Permiso::find($id);

        if (! $permiso) {
            return false;
        }

        return (bool) $permiso->delete();
    }
}