<?php

namespace App\Http\Controllers;

use App\Http\Requests\Permiso\StorePermisoRequest;
use App\Http\Requests\Permiso\UpdatePermisoRequest;
use App\Services\PermisoService;

class PermisoController extends Controller
{
    protected PermisoService $permisoService;

    public function __construct(PermisoService $permisoService)
    {
        $this->permisoService = $permisoService;
    }

    public function index()
    {
        $permisos = $this->permisoService->listar();

        return view('permisos.index', compact('permisos'));
    }

    public function create()
    {
        return view('permisos.create');
    }

    public function store(StorePermisoRequest $request)
    {
        $this->permisoService->crear($request->validated());

        return redirect()->route('permisos.index')->with('success', 'Permiso creado correctamente.');
    }

    public function edit(int $id)
    {
        $permiso = $this->permisoService->buscar($id);

        return view('permisos.edit', compact('permiso'));
    }

    public function update(UpdatePermisoRequest $request, int $id)
    {
        $this->permisoService->actualizar($id, $request->validated());

        return redirect()->route('permisos.index')->with('success', 'Permiso actualizado correctamente.');
    }

    public function destroy(int $id)
    {
        $this->permisoService->eliminar($id);

        return redirect()->route('permisos.index')->with('success', 'Permiso eliminado correctamente.');
    }
}