<?php

namespace App\Interfaces;

use App\Models\ConvocatoriaJugadores;
use Illuminate\Database\Eloquent\Collection;

interface ConvocatoriaJugadorRepositoryInterface
{
    public function all(): Collection;

    public function find(int $id): ?ConvocatoriaJugadores;

    public function create(array $data): ConvocatoriaJugadores;

    public function update(int $id, array $data): ?ConvocatoriaJugadores;

    public function delete(int $id): bool;
}