<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConvocatoriaJugador\StoreConvocatoriaJugadorRequest;
use App\Http\Requests\ConvocatoriaJugador\UpdateConvocatoriaJugadorRequest;
use App\Services\ConvocatoriaJugadorService;

class ConvocatoriaJugadorController extends Controller
{
    public function __construct(private ConvocatoriaJugadorService $convocatoriaJugadorService)
    {
    }

    public function index()
    {
        return response()->json([
            'success' => 'se listaron correctamente',
            'data' => $this->convocatoriaJugadorService->list()
        ]);
    }

    public function store(StoreConvocatoriaJugadorRequest $request)
    {
        $registroInsertado = $this->convocatoriaJugadorService->store($request->validated());

        return response()->json([
            'success' => 'jugador convocado correctamente',
            'data' => $registroInsertado
        ]);
    }

    public function show(int $id)
    {
        return response()->json([
            'success' => 'se encontró la convocatoria del jugador',
            'data' => $this->convocatoriaJugadorService->show($id)
        ]);
    }

    public function update(UpdateConvocatoriaJugadorRequest $request, int $id)
    {
        $registroActualizado = $this->convocatoriaJugadorService->update($id, $request->validated());

        return response()->json([
            'success' => 'convocatoria de jugador se actualizó correctamente',
            'data' => $registroActualizado
        ]);
    }

    public function destroy(int $id)
    {
        $this->convocatoriaJugadorService->destroy($id);

        return response()->json([
            'success' => 'jugador removido de la convocatoria'
        ]);
    }
}
