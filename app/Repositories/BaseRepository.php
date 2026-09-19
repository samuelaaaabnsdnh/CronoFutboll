<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    public function __construct(protected Model $model)
    {
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $registro = $this->model->find($id);

        if (! $registro) {
            return null;
        }

        $registro->update($data);

        return $registro;
    }

    public function delete(int $id): bool
    {
        $registro = $this->model->find($id);

        if (! $registro) {
            return false;
        }

        return (bool) $registro->delete();
    }

    protected function getByField(string $field, mixed $value, string $operator = '=')
    {
        $resultado = $this->model->where($field, $operator, $value)->get();

        return $resultado->isEmpty() ? null : $resultado;
    }
}
