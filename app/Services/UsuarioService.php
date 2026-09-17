<?php

namespace App\Services;

use App\Interfaces\UsuarioRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UsuarioService
{
    protected UsuarioRepositoryInterface $usuarioRepository;

    public function __construct(UsuarioRepositoryInterface $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function listar()
    {
        return $this->usuarioRepository->getAll();
    }

    public function buscar(int $id)
    {
        return $this->usuarioRepository->getById($id);
    }

    public function crear(array $data)
    {
        $data['password'] = Hash::make($data['password']);

        return $this->usuarioRepository->create($data);
    }

    public function actualizar(int $id, array $data)
    {
        if (! empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        return $this->usuarioRepository->update($data, $id);
    }

    public function eliminar(int $id): bool
    {
        return $this->usuarioRepository->delete($id);
    }
}