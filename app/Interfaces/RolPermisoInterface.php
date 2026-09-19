<?php

namespace App\Interfaces;

interface RolPermisoInterface
{
    public function getAll();

    public function create(array $data);

    public function delete(int $id_rol, int $id_permiso);

    public function exists(int $id_rol, int $id_permiso): bool;

    public function getByRol(int $id_rol);

    public function getByPermiso(int $id_permiso);
}
