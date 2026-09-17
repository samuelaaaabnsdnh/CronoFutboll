<?php

namespace App\Http\Controllers;

use App\Http\Requests\Usuario\StoreUsuarioRequest;
use App\Http\Requests\Usuario\UpdateUsuarioRequest;
use App\Services\UsuarioService;

class UsuarioController extends Controller
{
    protected UsuarioService $usuarioService;

    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function index()
    {
        $usuarios = $this->usuarioService->listar();

        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(StoreUsuarioRequest $request)
    {
        $this->usuarioService->crear($request->validated());

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    public function edit(int $id)
    {
        $usuario = $this->usuarioService->buscar($id);

        return view('usuarios.edit', compact('usuario'));
    }

    public function update(UpdateUsuarioRequest $request, int $id)
    {
        $this->usuarioService->actualizar($id, $request->validated());

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(int $id)
    {
        $this->usuarioService->eliminar($id);

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}