<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstadisticaJugador\StoreEstadisticaJugadorRequest;
use App\Http\Requests\EstadisticaJugador\UpdateEstadisticaJugadorRequest;
use App\Services\EstadisticaJugadorService;

class EstadisticaJugadorController extends Controller
{
    public function __construct(private EstadisticaJugadorService $estadisticaJugadorService)
    {
    }

    public function index()
    {
        return response()->json([
            'success' => 'se listaron correctamente',
            'data' => $this->estadisticaJugadorService->list()
        ]);
    }

    public function store(StoreEstadisticaJugadorRequest $request)
    {
        $registroInsertado = $this->estadisticaJugadorService->store($request->validated());

        return response()->json([
            'success' => 'estadística se creó correctamente',
            'data' => $registroInsertado
        ]);
    }

    public function show(int $id)
    {
        return response()->json([
            'success' => 'se encontró la estadística',
            'data' => $this->estadisticaJugadorService->show($id)
        ]);
    }

    public function update(UpdateEstadisticaJugadorRequest $request, int $id)
    {
        $registroActualizado = $this->estadisticaJugadorService->update($id, $request->validated());

        return response()->json([
            'success' => 'estadística se actualizó correctamente',
            'data' => $registroActualizado
        ]);
    }

    public function destroy(int $id)
    {
        $this->estadisticaJugadorService->destroy($id);

        return response()->json([
            'success' => 'estadística se eliminó correctamente'
        ]);
    }
}
