<?php

namespace App\Repositories;

use App\Interfaces\NotificacionRepositoryInterface;
use App\Models\Notificacion;

class NotificacionRepository implements NotificacionRepositoryInterface
{
    public function create(array $data)
    {
        return Notificacion::create($data);
    }

    public function getAll()
    {
        return Notificacion::all();
    }

    public function getById(int $id)
    {
        return Notificacion::find($id);
    }

    public function update(array $data, int $id)
    {
        $notificacion = Notificacion::find($id);

        if (! $notificacion) {
            return null;
        }

        $notificacion->update($data);

        return $notificacion;
    }

    public function delete(int $id)
    {
        $notificacion = Notificacion::find($id);

        if (! $notificacion) {
            return false;
        }

        return (bool) $notificacion->delete();
    }
}