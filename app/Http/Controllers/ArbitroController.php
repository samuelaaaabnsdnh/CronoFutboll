<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArbitroService;
use App\Http\Requests\Arbitro\StoreArbitroRequest;
use App\Http\Requests\Arbitro\UpdateArbitroRequest;

class ArbitroController extends Controller
{
    public function __construct(private ArbitroService $arbitroService)
    {
    }

    public function index()
    {
        return response()->json([
            'success' => 'se listaron correctamente',
            'data' => $this->arbitroService->list()
        ]);
    }

    public function store(StoreArbitroRequest $datos)
    {
        $registroInsertado = $this->arbitroService->store($datos->validated());
        return response()->json([
            'success' => 'árbitro se creó correctamente',
            'data' => $registroInsertado
        ]);
    }

    public function show(int $id)
    {
        return response()->json([
            'success' => 'se encontró el árbitro',
            'data' => $this->arbitroService->show($id)
        ]);
    }

    public function update(UpdateArbitroRequest $datosActualizar, int $id)
    {
        $registroActualizado = $this->arbitroService->update($id, $datosActualizar->validated());
        return response()->json([
            'success' => 'árbitro se actualizó correctamente',
            'data' => $registroActualizado
        ]);
    }

    public function destroy(int $id)
    {
        $this->arbitroService->destroy($id);
        return response()->json([
            'success' => 'árbitro se eliminó correctamente'
        ]);
    }
}