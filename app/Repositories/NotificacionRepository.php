<?php

namespace App\Repositories;

use App\Interfaces\NotificacionRepositoryInterface;
use App\Models\Notificacion;
use Illuminate\Database\Eloquent\Collection;

class NotificacionRepository implements NotificacionRepositoryInterface
{
    public function all(): Collection
    {
        return Notificacion::all();
    }

    public function find(int $id): ?Notificacion
    {
        return Notificacion::find($id);
    }

    public function create(array $data): Notificacion
    {
        return Notificacion::create($data);
    }

    public function update(int $id, array $data): ?Notificacion
    {
        $notificacion = Notificacion::find($id);

        if (! $notificacion) {
            return null;
        }

        $notificacion->update($data);

        return $notificacion;
    }

    public function delete(int $id): bool
    {
        $notificacion = Notificacion::find($id);

        if (! $notificacion) {
            return false;
        }

        return (bool) $notificacion->delete();
    }
}