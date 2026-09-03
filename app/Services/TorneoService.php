<?php
namespace App\Services;
use App\Interfaces\TorneoInterface;
use Carbon\Carbon;
class TorneoService
{
    public function __construct(
        private TorneoInterface $torneoRepository
    ){}
    public function list()
    {
        return $this->torneoRepository->getAll();
    }
    public function show(int $id)
    {
        return $this->torneoRepository->getById($id);
    }
    public function store(array $data)
    {
        return $this->torneoRepository->create($data);
    }
    public function update(int $id, array $data)
    {
        return $this->torneoRepository->update($id, $data);
    }
    public function destroy(int $id)
    {
        return $this->torneoRepository->delete($id);
    }
    public function getByEstado(string $estado)
    {
        return $this->torneoRepository->getByEstado($estado);
    }
    public function getByCategoria(string $categoria)
    {
        return $this->torneoRepository->getByCategoria($categoria);
    }
    public function getByFechaInicio(Carbon $fecha_inicio)
    {
        return $this->torneoRepository->getByFechaInicio($fecha_inicio);
    }
}
