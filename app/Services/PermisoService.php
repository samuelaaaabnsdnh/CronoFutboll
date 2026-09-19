<?php

namespace App\Services;

use App\Interfaces\PermisoInterface;

class PermisoService
{
    protected PermisoInterface $permisoRepository;

    public function __construct(PermisoInterface $permisoRepository)
    {
        $this->permisoRepository = $permisoRepository;
    }

    public function listar()
    {
        return $this->permisoRepository->getAll();
    }

    public function buscar(int $id)
    {
        return $this->permisoRepository->getById($id);
    }

    public function crear(array $data)
    {
        return $this->permisoRepository->create($data);
    }

    public function actualizar(int $id, array $data)
    {
        return $this->permisoRepository->update($data, $id);
    }

    public function eliminar(int $id): bool
    {
        return $this->permisoRepository->delete($id);
    }
}