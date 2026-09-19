<?php

namespace App\Services;

use App\Interfaces\RolInterface;

class RolService
{
    protected RolInterface $rolRepository;

    public function __construct(RolInterface $rolRepository)
    {
        $this->rolRepository = $rolRepository;
    }

    public function listar()
    {
        return $this->rolRepository->getAll();
    }

    public function buscar(int $id)
    {
        return $this->rolRepository->getById($id);
    }

    public function crear(array $data)
    {
        return $this->rolRepository->create($data);
    }

    public function actualizar(int $id, array $data)
    {
        return $this->rolRepository->update($data, $id);
    }

    public function eliminar(int $id): bool
    {
        return $this->rolRepository->delete($id);
    }
}