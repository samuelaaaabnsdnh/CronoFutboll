<?php

namespace App\Http\Controllers;

use App\Http\Requests\Equipos\StoreEquiposRequest;
use App\Http\Requests\Equipos\UpdateEquiposRequest;
use App\Services\EquipoService;

class EquiposController extends Controller
{
    public function __construct(private EquipoService $equipoService)
    {
    }

    public function index()
    {
        return response()->json([
            'success' => 'se listaron correctamente',
            'data' => $this->equipoService->list()
        ]);
    }

    public function store(StoreEquiposRequest $request)
    {
        $data = $request->validated();
        $data['fecha_registro'] = $data['fecha_registro'] ?? now();

        $registroInsertado = $this->equipoService->store($data);

        return response()->json([
            'success' => 'equipo se creó correctamente',
            'data' => $registroInsertado
        ]);
    }

    public function show(int $id)
    {
        return response()->json([
            'success' => 'se encontró el equipo',
            'data' => $this->equipoService->show($id)
        ]);
    }

    public function update(UpdateEquiposRequest $request, int $id)
    {
        $registroActualizado = $this->equipoService->update($id, $request->validated());

        return response()->json([
            'success' => 'equipo se actualizó correctamente',
            'data' => $registroActualizado
        ]);
    }

    public function destroy(int $id)
    {
        $this->equipoService->destroy($id);

        return response()->json([
            'success' => 'equipo se eliminó correctamente'
        ]);
    }
}
