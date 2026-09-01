<?php

namespace App\Services;

use App\Interfaces\NotificacionRepositoryInterface;
use App\Models\Notificacion;
use Illuminate\Database\Eloquent\Collection;

class NotificacionService
{
    protected NotificacionRepositoryInterface $notificacionRepository;

    public function __construct(NotificacionRepositoryInterface $notificacionRepository)
    {
        $this->notificacionRepository = $notificacionRepository;
    }

    public function listar(): Collection
    {
        return $this->notificacionRepository->all();
    }

    public function buscar(int $id): ?Notificacion
    {
        return $this->notificacionRepository->find($id);
    }

    public function crear(array $data): Notificacion
    {
        return $this->notificacionRepository->create($data);
    }

    public function actualizar(int $id, array $data): ?Notificacion
    {
        return $this->notificacionRepository->update($id, $data);
    }

    public function eliminar(int $id): bool
    {
        return $this->notificacionRepository->delete($id);
    }
}