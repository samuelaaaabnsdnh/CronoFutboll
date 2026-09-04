<?php

namespace App\Http\Controllers;

use App\Http\Requests\Notificacion\StoreNotificacionRequest;
use App\Http\Requests\Notificacion\UpdateNotificacionRequest;
use App\Services\NotificacionService;

class NotificacionController extends Controller
{
    protected NotificacionService $notificacionService;

    public function __construct(NotificacionService $notificacionService)
    {
        $this->notificacionService = $notificacionService;
    }

    public function index()
    {
        $notificaciones = $this->notificacionService->listar();

        return view('notificaciones.index', compact('notificaciones'));
    }

    public function create()
    {
        return view('notificaciones.create');
    }

    public function store(StoreNotificacionRequest $request)
    {
        $this->notificacionService->crear($request->validated());

        return redirect()->route('notificaciones.index')->with('success', 'Notificación creada correctamente.');
    }

    public function edit(int $id)
    {
        $notificacion = $this->notificacionService->buscar($id);

        return view('notificaciones.edit', compact('notificacion'));
    }

    public function update(UpdateNotificacionRequest $request, int $id)
    {
        $this->notificacionService->actualizar($id, $request->validated());

        return redirect()->route('notificaciones.index')->with('success', 'Notificación actualizada correctamente.');
    }

    public function destroy(int $id)
    {
        $this->notificacionService->eliminar($id);

        return redirect()->route('notificaciones.index')->with('success', 'Notificación eliminada correctamente.');
    }
}