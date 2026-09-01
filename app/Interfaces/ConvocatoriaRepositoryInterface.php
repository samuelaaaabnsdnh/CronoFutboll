<?php

namespace App\Interfaces;

use App\Models\Convocatorias;
use Illuminate\Database\Eloquent\Collection;

interface ConvocatoriaRepositoryInterface
{
    public function all(): Collection;

    public function find(int $id): ?Convocatorias;

    public function create(array $data): Convocatorias;

    public function update(int $id, array $data): ?Convocatorias;

    public function delete(int $id): bool;
}