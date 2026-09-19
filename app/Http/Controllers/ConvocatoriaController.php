<?php

namespace App\Http\Controllers;

use App\Http\Requests\Convocatoria\StoreConvocatoriaRequest;
use App\Http\Requests\Convocatoria\UpdateConvocatoriaRequest;
use App\Services\ConvocatoriaService;

class ConvocatoriaController extends Controller
{
    public function __construct(private ConvocatoriaService $convocatoriaService)
    {
    }

    public function index()
    {
        return response()->json([
            'success' => 'se listaron correctamente',
            'data' => $this->convocatoriaService->list()
        ]);
    }

    public function store(StoreConvocatoriaRequest $request)
    {
        $registroInsertado = $this->convocatoriaService->store($request->validated());

        return response()->json([
            'success' => 'convocatoria se creó correctamente',
            'data' => $registroInsertado
        ]);
    }

    public function show(int $id)
    {
        return response()->json([
            'success' => 'se encontró la convocatoria',
            'data' => $this->convocatoriaService->show($id)
        ]);
    }

    public function update(UpdateConvocatoriaRequest $request, int $id)
    {
        $registroActualizado = $this->convocatoriaService->update($id, $request->validated());

        return response()->json([
            'success' => 'convocatoria se actualizó correctamente',
            'data' => $registroActualizado
        ]);
    }

    public function destroy(int $id)
    {
        $this->convocatoriaService->destroy($id);

        return response()->json([
            'success' => 'convocatoria se eliminó correctamente'
        ]);
    }
}
