<?php
namespace App\Services;
use App\Interfaces\ConvocatoriaInterface;
class ConvocatoriaService
{
    public function __construct(
        private ConvocatoriaInterface $convocatoriaRepository
    ){}
    public function list()
    {
        return $this->convocatoriaRepository->all();
    }
    public function show(int $id)
    {
        return $this->convocatoriaRepository->find($id);
    }
    public function store(array $data)
    {
        return $this->convocatoriaRepository->create($data);
    }
    public function update(int $id, array $data)
    {
        return $this->convocatoriaRepository->update($id, $data);
    }
    public function destroy(int $id)
    {
        return $this->convocatoriaRepository->delete($id);
    }
}
