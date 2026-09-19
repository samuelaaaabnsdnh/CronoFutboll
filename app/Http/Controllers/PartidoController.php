<?php

namespace App\Http\Controllers;

use App\Http\Requests\Partido\StorePartidoRequest;
use App\Http\Requests\Partido\UpdatePartidoRequest;
use App\Services\PartidoService;

class PartidoController extends Controller
{
    public function __construct(private PartidoService $partidoService)
    {
    }

    public function index()
    {
        return response()->json([
            'success' => 'se listaron correctamente',
            'data' => $this->partidoService->list()
        ]);
    }

    public function store(StorePartidoRequest $request)
    {
        $registroInsertado = $this->partidoService->store($request->validated());

        return response()->json([
            'success' => 'partido se creó correctamente',
            'data' => $registroInsertado
        ]);
    }

    public function show(int $id)
    {
        return response()->json([
            'success' => 'se encontró el partido',
            'data' => $this->partidoService->show($id)
        ]);
    }

    public function update(UpdatePartidoRequest $request, int $id)
    {
        $registroActualizado = $this->partidoService->update($id, $request->validated());

        return response()->json([
            'success' => 'partido se actualizó correctamente',
            'data' => $registroActualizado
        ]);
    }

    public function destroy(int $id)
    {
        $this->partidoService->destroy($id);

        return response()->json([
            'success' => 'partido se eliminó correctamente'
        ]);
    }
}
