<?php

namespace App\Repositories;

use App\Interfaces\UsuarioInterface;
use App\Models\Usuario;

class UsuarioRepository implements UsuarioInterface
{
    public function create(array $data)
    {
        return Usuario::create($data);
    }

    public function getAll()
    {
        return Usuario::all();
    }

    public function getById(int $id)
    {
        return Usuario::find($id);
    }

    public function update(array $data, int $id)
    {
        $usuario = Usuario::find($id);

        if (! $usuario) {
            return null;
        }

        $usuario->update($data);

        return $usuario;
    }

    public function delete(int $id)
    {
        $usuario = Usuario::find($id);

        if (! $usuario) {
            return false;
        }

        return (bool) $usuario->delete();
    }
}