<?php

namespace App\Repositories;

use App\Interfaces\UsuarioRepositoryInterface;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Collection;

class UsuarioRepository implements UsuarioRepositoryInterface
{
    public function all(): Collection
    {
        return Usuario::all();
    }

    public function find(int $id): ?Usuario
    {
        return Usuario::find($id);
    }

    public function create(array $data): Usuario
    {
        return Usuario::create($data);
    }

    public function update(int $id, array $data): ?Usuario
    {
        $usuario = Usuario::find($id);

        if (! $usuario) {
            return null;
        }

        $usuario->update($data);

        return $usuario;
    }

    public function delete(int $id): bool
    {
        $usuario = Usuario::find($id);

        if (! $usuario) {
            return false;
        }

        return (bool) $usuario->delete();
    }
}