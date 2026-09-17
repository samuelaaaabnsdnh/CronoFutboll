<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CanchaService;
use App\Http\Requests\Cancha\StoreCanchaRequest;
use App\Http\Requests\Cancha\UpdateCanchaRequest;

class CanchaController extends Controller
{
    public function __construct(private CanchaService $canchaService)
    {
    }

    public function index()
    {
        return response()->json([
            'success' => 'se listaron correctamente',
            'data' => $this->canchaService->list()
        ]);
    }

    public function store(StoreCanchaRequest $datos)
    {
        $registroInsertado = $this->canchaService->store($datos->validated());
        return response()->json([
            'success' => 'cancha se creó correctamente',
            'data' => $registroInsertado
        ]);
    }

    public function show(int $id)
    {
        return response()->json([
            'success' => 'se encontró la cancha',
            'data' => $this->canchaService->show($id)
        ]);
    }

    public function update(UpdateCanchaRequest $datosActualizar, int $id)
    {
        $registroActualizado = $this->canchaService->update($id, $datosActualizar->validated());
        return response()->json([
            'success' => 'cancha se actualizó correctamente',
            'data' => $registroActualizado
        ]);
    }

    public function destroy(int $id)
    {
        $this->canchaService->destroy($id);
        return response()->json([
            'success' => 'cancha se eliminó correctamente'
        ]);
    }
}