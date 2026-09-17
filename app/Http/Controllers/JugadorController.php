<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\JugadorService;
use App\Http\Requests\Jugador\StoreJugadorRequest;
use App\Http\Requests\Jugador\UpdateJugadorRequest;

class JugadorController extends Controller
{
    public function __construct(private JugadorService $jugadorService)
    {
    }

    public function index()
    {
        return response()->json([
            'success' => 'se listaron correctamente',
            'data' => $this->jugadorService->list()
        ]);
    }

    public function store(StoreJugadorRequest $datos)
    {
        $registroInsertado = $this->jugadorService->store($datos->validated());
        return response()->json([
            'success' => 'jugador se creó correctamente',
            'data' => $registroInsertado
        ]);
    }

    public function show(int $id)
    {
        return response()->json([
            'success' => 'se encontró el jugador',
            'data' => $this->jugadorService->show($id)
        ]);
    }

    public function update(UpdateJugadorRequest $datosActualizar, int $id)
    {
        $registroActualizado = $this->jugadorService->update($id, $datosActualizar->validated());
        return response()->json([
            'success' => 'jugador se actualizó correctamente',
            'data' => $registroActualizado
        ]);
    }

    public function destroy(int $id)
    {
        $this->jugadorService->destroy($id);
        return response()->json([
            'success' => 'jugador se eliminó correctamente'
        ]);
    }
}