<?php

namespace App\Services;

use App\Interfaces\CanchaInterface;

class CanchaService
{
    public function __construct(
        private CanchasInterface $canchaRepository
    ){}

    public function list()
    {
        return $this->canchaRepository->all();
    }

    public function show(int $id)
    {
        return $this->canchaRepository->find($id);
    }

    public function store(array $data)
    {
        return $this->canchaRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->canchaRepository->update($id, $data);
    }

    public function destroy(int $id)
    {
        return $this->canchaRepository->delete($id);
    }

    public function getByUbicacion(string $ubicacion)
    {
        return $this->canchaRepository->getByUbicacion($ubicacion);
    }

    public function getByEstado(string $estado)
    {
        return $this->canchaRepository->getByEstado($estado);
    }

    public function getByCapacidadMinima(int $capacidad)
    {
        return $this->canchaRepository->getByCapacidad($capacidad);
    }
}