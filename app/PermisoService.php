<?php

namespace App\Services;

use App\Interfaces\PermisoRepositoryInterface;
use App\Models\Permiso;
use Illuminate\Database\Eloquent\Collection;

class PermisoService
{
    protected PermisoRepositoryInterface $permisoRepository;

    public function __construct(PermisoRepositoryInterface $permisoRepository)
    {
        $this->permisoRepository = $permisoRepository;
    }

    public function listar(): Collection
    {
        return $this->permisoRepository->all();
    }

    public function buscar(int $id): ?Permiso
    {
        return $this->permisoRepository->find($id);
    }

    public function crear(array $data): Permiso
    {
        return $this->permisoRepository->create($data);
    }

    public function actualizar(int $id, array $data): ?Permiso
    {
        return $this->permisoRepository->update($id, $data);
    }

    public function eliminar(int $id): bool
    {
        return $this->permisoRepository->delete($id);
    }
}