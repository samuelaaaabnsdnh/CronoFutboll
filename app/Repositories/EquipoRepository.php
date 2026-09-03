<?php

namespace App\Repositories;

use App\Interfaces\EquipoInterface;
use App\Models\Equipos;

class EquipoRepository implements EquipoInterface
{
    protected Equipos $model;

    public function __construct(Equipos $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->orderBy('nombre')->get();
    }

    public function getById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        $data['fecha_registro'] = $data['fecha_registro'] ?? now();

        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $equipo = $this->getById($id);
        $equipo->update($data);

        return $equipo;
    }

    public function delete(int $id)
    {
        return $this->getById($id)->delete();
    }

    public function getByNombre(string $nombre)
    {
        return $this->model->where('nombre', 'like', "%{$nombre}%")->get();
    }

    public function getByEstado(string $estado)
    {
        return $this->model->where('estado', $estado)->get();
    }
}
