<?php

namespace App\Http\Controllers;

use App\Http\Requests\Permiso\StorePermisoRequest;
use App\Http\Requests\Permiso\UpdatePermisoRequest;
use App\Services\PermisoService;

class PermisoController extends Controller
{
    public function __construct(private PermisoService $permisoService)
    {
    }

    public function index()
    {
        return response()->json([
            'success' => 'se listaron correctamente',
            'data' => $this->permisoService->listar()
        ]);
    }

    public function store(StorePermisoRequest $request)
    {
        $registroInsertado = $this->permisoService->crear($request->validated());

        return response()->json([
            'success' => 'permiso se creó correctamente',
            'data' => $registroInsertado
        ]);
    }

    public function show(int $id)
    {
        return response()->json([
            'success' => 'se encontró el permiso',
            'data' => $this->permisoService->buscar($id)
        ]);
    }

    public function update(UpdatePermisoRequest $request, int $id)
    {
        $registroActualizado = $this->permisoService->actualizar($id, $request->validated());

        return response()->json([
            'success' => 'permiso se actualizó correctamente',
            'data' => $registroActualizado
        ]);
    }

    public function destroy(int $id)
    {
        $this->permisoService->eliminar($id);

        return response()->json([
            'success' => 'permiso se eliminó correctamente'
        ]);
    }
}
