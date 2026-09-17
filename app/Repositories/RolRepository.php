<?php

namespace App\Repositories;

use App\Interfaces\RolRepositoryInterface;
use App\Models\Rol;

class RolRepository implements RolRepositoryInterface
{
    public function create(array $data)
    {
        return Rol::create($data);
    }

    public function getAll()
    {
        return Rol::all();
    }

    public function getById(int $id)
    {
        return Rol::find($id);
    }

    public function update(array $data, int $id)
    {
        $rol = Rol::find($id);

        if (! $rol) {
            return null;
        }

        $rol->update($data);

        return $rol;
    }

    public function delete(int $id)
    {
        $rol = Rol::find($id);

        if (! $rol) {
            return false;
        }

        return (bool) $rol->delete();
    }
}