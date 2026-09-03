<?php

namespace App\Repositories;

use App\Interfaces\TorneoInterface;
use App\Models\Torneos;
use Carbon\Carbon;

class TorneoRepository implements TorneoInterface
{
    protected Torneos $model;

    public function __construct(Torneos $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->orderBy('fecha_inicio', 'desc')->get();
    }

    public function getById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $torneo = $this->getById($id);
        $torneo->update($data);

        return $torneo;
    }

    public function delete(int $id)
    {
        return $this->getById($id)->delete();
    }

    public function getByEstado(string $estado)
    {
        return $this->model->where('estado', $estado)->get();
    }

    public function getByCategoria(string $categoria)
    {
        return $this->model->where('categoria', $categoria)->get();
    }

    public function getByFechaInicio(Carbon $fecha_inicio)
    {
        return $this->model->whereDate('fecha_inicio', $fecha_inicio)->get();
    }
}
