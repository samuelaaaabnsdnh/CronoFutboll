<?php

namespace App\Interfaces;

interface EquipoInterface
{
    public function getAll();

    public function getById(int $id);

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);

    public function getByNombre(string $nombre);

    public function getByEstado(string $estado);
}
