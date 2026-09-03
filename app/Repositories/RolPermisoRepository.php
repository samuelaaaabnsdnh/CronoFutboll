<?php

namespace App\Repositories;

use App\Interfaces\RolPermisoInterface;
use App\Models\RolPermiso;

class RolPermisoRepository implements RolPermisoInterface
{
    protected RolPermiso $model;

    public function __construct(RolPermiso $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->with(['rol', 'permiso'])->get();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function delete(int $id_rol, int $id_permiso)
    {
        return $this->model
            ->where('id_rol', $id_rol)
            ->where('id_permiso', $id_permiso)
            ->delete();
    }

    public function exists(int $id_rol, int $id_permiso): bool
    {
        return $this->model
            ->where('id_rol', $id_rol)
            ->where('id_permiso', $id_permiso)
            ->exists();
    }

    public function getByRol(int $id_rol)
    {
        return $this->model->with('permiso')->where('id_rol', $id_rol)->get();
    }

    public function getByPermiso(int $id_permiso)
    {
        return $this->model->with('rol')->where('id_permiso', $id_permiso)->get();
    }
}
