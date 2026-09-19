<?php

namespace App\Http\Controllers;

use App\Http\Requests\Notificacion\StoreNotificacionRequest;
use App\Http\Requests\Notificacion\UpdateNotificacionRequest;
use App\Services\NotificacionService;

class NotificacionController extends Controller
{
    public function __construct(private NotificacionService $notificacionService)
    {
    }

    public function index()
    {
        return response()->json([
            'success' => 'se listaron correctamente',
            'data' => $this->notificacionService->listar()
        ]);
    }

    public function store(StoreNotificacionRequest $request)
    {
        $registroInsertado = $this->notificacionService->crear($request->validated());

        return response()->json([
            'success' => 'notificación se creó correctamente',
            'data' => $registroInsertado
        ]);
    }

    public function show(int $id)
    {
        return response()->json([
            'success' => 'se encontró la notificación',
            'data' => $this->notificacionService->buscar($id)
        ]);
    }

    public function update(UpdateNotificacionRequest $request, int $id)
    {
        $registroActualizado = $this->notificacionService->actualizar($id, $request->validated());

        return response()->json([
            'success' => 'notificación se actualizó correctamente',
            'data' => $registroActualizado
        ]);
    }

    public function destroy(int $id)
    {
        $this->notificacionService->eliminar($id);

        return response()->json([
            'success' => 'notificación se eliminó correctamente'
        ]);
    }
}
