<?php
namespace App\Services;
use App\Interfaces\RolPermisoInterface;
class RolPermisoService
{
    public function __construct(
        private RolPermisoInterface $rolPermisoRepository
    ){}
    public function list()
    {
        return $this->rolPermisoRepository->getAll();
    }
    public function store(array $data)
    {
        return $this->rolPermisoRepository->create($data);
    }
    public function destroy(int $id_rol, int $id_permiso)
    {
        return $this->rolPermisoRepository->delete($id_rol, $id_permiso);
    }
    public function exists(int $id_rol, int $id_permiso): bool
    {
        return $this->rolPermisoRepository->exists($id_rol, $id_permiso);
    }
    public function getByRol(int $id_rol)
    {
        return $this->rolPermisoRepository->getByRol($id_rol);
    }
    public function getByPermiso(int $id_permiso)
    {
        return $this->rolPermisoRepository->getByPermiso($id_permiso);
    }
}
