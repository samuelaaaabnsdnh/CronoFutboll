<?php

namespace App\Interfaces;

use App\Models\Partidos;
use Illuminate\Database\Eloquent\Collection;

interface PartidoRepositoryInterface
{
    public function all(): Collection;

    public function find(int $id): ?Partidos;

    public function create(array $data): Partidos;

    public function update(int $id, array $data): ?Partidos;

    public function delete(int $id): bool;
}