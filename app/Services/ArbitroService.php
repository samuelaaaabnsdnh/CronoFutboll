<?php

namespace App\Services;

use App\Interfaces\ArbitroInterface;

class ArbitroService
{
    public function __construct(
        private ArbitrosInterface $arbitroRepository
    ){}

    public function list()
    {
        return $this->arbitroRepository->all();
    }

    public function show(int $id)
    {
        return $this->arbitroRepository->find($id);
    }

    public function store(array $data)
    {
        return $this->arbitroRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->arbitroRepository->update($id, $data);
    }

    public function destroy(int $id)
    {
        return $this->arbitroRepository->delete($id);
    }

    public function getByDocumento(string $documento)
    {
        return $this->arbitroRepository->getByDocumento($documento);
    }

    public function getByEstado(string $estado)
    {
        return $this->arbitroRepository->getByEstado($estado);
    }

    public function getByExperiencia(int $experiencia)
    {
        return $this->arbitroRepository->getByExperiencia($experiencia);
    }
}