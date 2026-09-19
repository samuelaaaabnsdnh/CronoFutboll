<?php

namespace App\Http\Controllers;

use App\Http\Requests\Rol\StoreRolRequest;
use App\Http\Requests\Rol\UpdateRolRequest;
use App\Services\RolService;

class RolController extends Controller
{
    public function __construct(private RolService $rolService)
    {
    }

    public function index()
    {
        return response()->json([
            'success' => 'se listaron correctamente',
            'data' => $this->rolService->listar()
        ]);
    }

    public function store(StoreRolRequest $request)
    {
        $registroInsertado = $this->rolService->crear($request->validated());

        return response()->json([
            'success' => 'rol se creó correctamente',
            'data' => $registroInsertado
        ]);
    }

    public function show(int $id)
    {
        return response()->json([
            'success' => 'se encontró el rol',
            'data' => $this->rolService->buscar($id)
        ]);
    }

    public function update(UpdateRolRequest $request, int $id)
    {
        $registroActualizado = $this->rolService->actualizar($id, $request->validated());

        return response()->json([
            'success' => 'rol se actualizó correctamente',
            'data' => $registroActualizado
        ]);
    }

    public function destroy(int $id)
    {
        $this->rolService->eliminar($id);

        return response()->json([
            'success' => 'rol se eliminó correctamente'
        ]);
    }
}
