<?php
namespace App\Services;
use App\Interfaces\PartidoRepositoryInterface;
class PartidoService
{
    public function __construct(
        private PartidoRepositoryInterface $partidoRepository
    ){}
    public function list()
    {
        return $this->partidoRepository->all();
    }
    public function show(int $id)
    {
        return $this->partidoRepository->find($id);
    }
    public function store(array $data)
    {
        return $this->partidoRepository->create($data);
    }
    public function update(int $id, array $data)
    {
        return $this->partidoRepository->update($id, $data);
    }
    public function destroy(int $id)
    {
        return $this->partidoRepository->delete($id);
    }
}
