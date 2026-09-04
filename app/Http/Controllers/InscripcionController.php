<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InscripcionService;
use App\Http\Requests\Inscripcion\StoreInscripcionRequest;
use App\Http\Requests\Inscripcion\UpdateInscripcionRequest;

class InscripcionController extends Controller
{
    public function __construct(private InscripcionService $inscripcionService)
    {
    }

    public function index()
    {
        return response()->json([
            'success' => 'se listaron correctamente',
            'data' => $this->inscripcionService->list()
        ]);
    }

    public function store(StoreInscripcionRequest $datos)
    {
        $registroInsertado = $this->inscripcionService->store($datos->validated());
        return response()->json([
            'success' => 'inscripción se creó correctamente',
            'data' => $registroInsertado
        ]);
    }

    public function show(int $id)
    {
        return response()->json([
            'success' => 'se encontró la inscripción',
            'data' => $this->inscripcionService->show($id)
        ]);
    }

    public function update(UpdateInscripcionRequest $datosActualizar, int $id)
    {
        $registroActualizado = $this->inscripcionService->update($id, $datosActualizar->validated());
        return response()->json([
            'success' => 'inscripción se actualizó correctamente',
            'data' => $registroActualizado
        ]);
    }

    public function destroy(int $id)
    {
        $this->inscripcionService->destroy($id);
        return response()->json([
            'success' => 'inscripción se eliminó correctamente'
        ]);
    }
}