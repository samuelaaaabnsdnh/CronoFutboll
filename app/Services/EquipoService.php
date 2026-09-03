<?php
namespace App\Services;
use App\Interfaces\EquipoInterface;
class EquipoService
{
    public function __construct(
        private EquipoInterface $equipoRepository
    ){}
    public function list()
    {
        return $this->equipoRepository->getAll();
    }
    public function show(int $id)
    {
        return $this->equipoRepository->getById($id);
    }
    public function store(array $data)
    {
        return $this->equipoRepository->create($data);
    }
    public function update(int $id, array $data)
    {
        return $this->equipoRepository->update($id, $data);
    }
    public function destroy(int $id)
    {
        return $this->equipoRepository->delete($id);
    }
    public function getByNombre(string $nombre)
    {
        return $this->equipoRepository->getByNombre($nombre);
    }
    public function getByEstado(string $estado)
    {
        return $this->equipoRepository->getByEstado($estado);
    }
}
