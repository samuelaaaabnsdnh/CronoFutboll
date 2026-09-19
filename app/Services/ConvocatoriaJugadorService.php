<?php
namespace App\Services;
use App\Interfaces\ConvocatoriaJugadorInterface;
class ConvocatoriaJugadorService
{
    public function __construct(
        private ConvocatoriaJugadorInterface $convocatoriaJugadorRepository
    ){}
    public function list()
    {
        return $this->convocatoriaJugadorRepository->all();
    }
    public function show(int $id)
    {
        return $this->convocatoriaJugadorRepository->find($id);
    }
    public function store(array $data)
    {
        return $this->convocatoriaJugadorRepository->create($data);
    }
    public function update(int $id, array $data)
    {
        return $this->convocatoriaJugadorRepository->update($id, $data);
    }
    public function destroy(int $id)
    {
        return $this->convocatoriaJugadorRepository->delete($id);
    }
}
