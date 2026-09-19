<?php

namespace App\Http\Controllers;

use App\Http\Requests\Usuario\StoreUsuarioRequest;
use App\Http\Requests\Usuario\UpdateUsuarioRequest;
use App\Services\UsuarioService;

class UsuarioController extends Controller
{
    public function __construct(private UsuarioService $usuarioService)
    {
    }

    public function index()
    {
        return response()->json([
            'success' => 'se listaron correctamente',
            'data' => $this->usuarioService->listar()
        ]);
    }

    public function store(StoreUsuarioRequest $request)
    {
        $registroInsertado = $this->usuarioService->crear($request->validated());

        return response()->json([
            'success' => 'usuario se creó correctamente',
            'data' => $registroInsertado
        ]);
    }

    public function show(int $id)
    {
        return response()->json([
            'success' => 'se encontró el usuario',
            'data' => $this->usuarioService->buscar($id)
        ]);
    }

    public function update(UpdateUsuarioRequest $request, int $id)
    {
        $registroActualizado = $this->usuarioService->actualizar($id, $request->validated());

        return response()->json([
            'success' => 'usuario se actualizó correctamente',
            'data' => $registroActualizado
        ]);
    }

    public function destroy(int $id)
    {
        $this->usuarioService->eliminar($id);

        return response()->json([
            'success' => 'usuario se eliminó correctamente'
        ]);
    }
}
