<?php

namespace App\Http\Controllers;

use App\Http\Requests\Torneos\StoreTorneosRequest;
use App\Http\Requests\Torneos\UpdateTorneosRequest;
use App\Services\TorneoService;

class TorneosController extends Controller
{
    public function __construct(private TorneoService $torneoService)
    {
    }

    public function index()
    {
        return response()->json([
            'success' => 'se listaron correctamente',
            'data' => $this->torneoService->list()
        ]);
    }

    public function store(StoreTorneosRequest $request)
    {
        $registroInsertado = $this->torneoService->store($request->validated());

        return response()->json([
            'success' => 'torneo se creó correctamente',
            'data' => $registroInsertado
        ]);
    }

    public function show(int $id)
    {
        return response()->json([
            'success' => 'se encontró el torneo',
            'data' => $this->torneoService->show($id)
        ]);
    }

    public function update(UpdateTorneosRequest $request, int $id)
    {
        $registroActualizado = $this->torneoService->update($id, $request->validated());

        return response()->json([
            'success' => 'torneo se actualizó correctamente',
            'data' => $registroActualizado
        ]);
    }

    public function destroy(int $id)
    {
        $this->torneoService->destroy($id);

        return response()->json([
            'success' => 'torneo se eliminó correctamente'
        ]);
    }
}