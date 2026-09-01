<?php

namespace App\Services;

use App\Interfaces\RolRepositoryInterface;
use App\Models\Rol;
use Illuminate\Database\Eloquent\Collection;

class RolService
{
    protected RolRepositoryInterface $rolRepository;

    public function __construct(RolRepositoryInterface $rolRepository)
    {
        $this->rolRepository = $rolRepository;
    }

    public function listar(): Collection
    {
        return $this->rolRepository->all();
    }

    public function buscar(int $id): ?Rol
    {
        return $this->rolRepository->find($id);
    }

    public function crear(array $data): Rol
    {
        return $this->rolRepository->create($data);
    }

    public function actualizar(int $id, array $data): ?Rol
    {
        return $this->rolRepository->update($id, $data);
    }

    public function eliminar(int $id): bool
    {
        return $this->rolRepository->delete($id);
    }
}