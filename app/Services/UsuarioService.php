<?php

namespace App\Services;

use App\Interfaces\UsuarioRepositoryInterface;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UsuarioService
{
    protected UsuarioRepositoryInterface $usuarioRepository;

    public function __construct(UsuarioRepositoryInterface $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function listar(): Collection
    {
        return $this->usuarioRepository->all();
    }

    public function buscar(int $id): ?Usuario
    {
        return $this->usuarioRepository->find($id);
    }

    public function crear(array $data): Usuario
    {
        $data['password'] = Hash::make($data['password']);

        return $this->usuarioRepository->create($data);
    }

    public function actualizar(int $id, array $data): ?Usuario
    {
        if (! empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        return $this->usuarioRepository->update($id, $data);
    }

    public function eliminar(int $id): bool
    {
        return $this->usuarioRepository->delete($id);
    }
}