<?php

namespace App\Http\Controllers;

use App\Http\Requests\Rol\StoreRolRequest;
use App\Http\Requests\Rol\UpdateRolRequest;
use App\Services\RolService;

class RolController extends Controller
{
    protected RolService $rolService;

    public function __construct(RolService $rolService)
    {
        $this->rolService = $rolService;
    }

    public function index()
    {
        $roles = $this->rolService->listar();

        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(StoreRolRequest $request)
    {
        $this->rolService->crear($request->validated());

        return redirect()->route('roles.index')->with('success', 'Rol creado correctamente.');
    }

    public function edit(int $id)
    {
        $rol = $this->rolService->buscar($id);

        return view('roles.edit', compact('rol'));
    }

    public function update(UpdateRolRequest $request, int $id)
    {
        $this->rolService->actualizar($id, $request->validated());

        return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente.');
    }

    public function destroy(int $id)
    {
        $this->rolService->eliminar($id);

        return redirect()->route('roles.index')->with('success', 'Rol eliminado correctamente.');
    }
}