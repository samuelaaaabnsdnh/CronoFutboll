<?php

namespace App\Services;

use App\Interfaces\InscripcionInterface;

class InscripcionService
{
    public function __construct(
        private InscripcionesInterface $inscripcionRepository
    ){}

    public function list()
    {
        return $this->inscripcionRepository->all();
    }

    public function show(int $id)
    {
        return $this->inscripcionRepository->find($id);
    }

    public function store(array $data)
    {
        return $this->inscripcionRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->inscripcionRepository->update($id, $data);
    }

    public function destroy(int $id)
    {
        return $this->inscripcionRepository->delete($id);
    }

    public function getByTorneo(int $idTorneo)
    {
        return $this->inscripcionRepository->getByTorneo($idTorneo);
    }

    public function getByEquipo(int $idTorneo)
    {
        return $this->inscripcionRepository->getByEquipo($idEquipo);
    }

    public function getByEstado(string $estado)
    {
        return $this->inscripcionRepository->getByEstado($estado);
    }
}