<?php

namespace App\Http\Controllers;

use App\Http\Requests\Usuario\StoreUsuarioRequest;
use App\Http\Requests\Usuario\UpdateUsuarioRequest;
use App\Models\Usuario;
use App\Services\UsuarioService;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function __construct(private UsuarioService $usuarioService)
    {
    }

    private function esAdmin(?Usuario $usuario): bool
    {
        $rol = $usuario?->loadMissing('rol')->rol?->nombre;

        return $rol !== null && str_contains(mb_strtolower($rol), 'admin');
    }

    private function soloAdmin(Request $request): void
    {
        if (! $this->esAdmin($request->user())) {
            abort(403, 'Solo un administrador puede realizar esta acción.');
        }
    }

    public function index(Request $request)
    {
        $this->soloAdmin($request);

        return response()->json([
            'success' => 'se listaron correctamente',
            'data' => $this->usuarioService->listar()
        ]);
    }

    public function store(StoreUsuarioRequest $request)
    {
        $this->soloAdmin($request);

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
        $actor = $request->user();
        $datos = $request->validated();

        if (! $this->esAdmin($actor)) {
            // Un usuario normal solo edita su propio perfil y no puede cambiarse el rol ni el estado.
            if ((int) $actor->id !== $id) {
                abort(403, 'Solo puedes editar tu propio perfil.');
            }

            $datos['rol_id'] = $actor->rol_id;
            $datos['estado'] = $actor->estado;
        }

        $registroActualizado = $this->usuarioService->actualizar($id, $datos);

        return response()->json([
            'success' => 'usuario se actualizó correctamente',
            'data' => $registroActualizado
        ]);
    }

    public function destroy(Request $request, int $id)
    {
        $this->soloAdmin($request);

        $this->usuarioService->eliminar($id);

        return response()->json([
            'success' => 'usuario se eliminó correctamente'
        ]);
    }
}
