<?php
namespace App\Services;
use App\Interfaces\EstadisticaJugadorRepositoryInterface;
class EstadisticaJugadorService
{
    public function __construct(
        private EstadisticaJugadorRepositoryInterface $estadisticaJugadorRepository
    ){}
    public function list()
    {
        return $this->estadisticaJugadorRepository->all();
    }
    public function show(int $id)
    {
        return $this->estadisticaJugadorRepository->find($id);
    }
    public function store(array $data)
    {
        return $this->estadisticaJugadorRepository->create($data);
    }
    public function update(int $id, array $data)
    {
        return $this->estadisticaJugadorRepository->update($id, $data);
    }
    public function destroy(int $id)
    {
        return $this->estadisticaJugadorRepository->delete($id);
    }
}
