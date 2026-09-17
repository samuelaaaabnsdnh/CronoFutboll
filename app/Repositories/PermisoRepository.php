<?php

namespace App\Repositories;

use App\Interfaces\PermisoRepositoryInterface;
use App\Models\Permiso;

class PermisoRepository implements PermisoRepositoryInterface
{
    public function create(array $data)
    {
        return Permiso::create($data);
    }

    public function getAll()
    {
        return Permiso::all();
    }

    public function getById(int $id)
    {
        return Permiso::find($id);
    }

    public function update(array $data, int $id)
    {
        $permiso = Permiso::find($id);

        if (! $permiso) {
            return null;
        }

        $permiso->update($data);

        return $permiso;
    }

    public function delete(int $id)
    {
        $permiso = Permiso::find($id);

        if (! $permiso) {
            return false;
        }

        return (bool) $permiso->delete();
    }
}