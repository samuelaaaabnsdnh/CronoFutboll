<?php

namespace App\Services;

use App\Interfaces\JugadorInterface;

class JugadorService
{
    public function __construct(
        private JugadoresInterface $jugadorRepository
    ){}

    public function list()
    {
        return $this->jugadorRepository->all();
    }

    public function show(int $id)
    {
        return $this->jugadorRepository->find($id);
    }

    public function store(array $data)
    {
        return $this->jugadorRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->jugadorRepository->update($id, $data);
    }

    public function destroy(int $id)
    {
        return $this->jugadorRepository->delete($id);
    }

    public function getByDocumento(string $documento)
    {
        return $this->jugadorRepository->getByDocumento($documento);
    }

    public function getByPosicion(string $posicion)
    {
        return $this->jugadorRepository->getByPosicion($posicion);
    }

    public function getByEstado(string $estado)
    {
        return $this->jugadorRepository->getByEstado($estado);
    }
}