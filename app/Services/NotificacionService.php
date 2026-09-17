<?php

namespace App\Services;

use App\Interfaces\NotificacionRepositoryInterface;

class NotificacionService
{
    protected NotificacionRepositoryInterface $notificacionRepository;

    public function __construct(NotificacionRepositoryInterface $notificacionRepository)
    {
        $this->notificacionRepository = $notificacionRepository;
    }

    public function listar()
    {
        return $this->notificacionRepository->getAll();
    }

    public function buscar(int $id)
    {
        return $this->notificacionRepository->getById($id);
    }

    public function crear(array $data)
    {
        return $this->notificacionRepository->create($data);
    }

    public function actualizar(int $id, array $data)
    {
        return $this->notificacionRepository->update($data, $id);
    }

    public function eliminar(int $id): bool
    {
        return $this->notificacionRepository->delete($id);
    }
}