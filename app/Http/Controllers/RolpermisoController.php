<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolPermiso\StoreRolPermisoRequest;
use App\Http\Requests\RolPermiso\UpdateRolPermisoRequest;
use App\Services\RolPermisoService;

class RolPermisoController extends Controller
{
    public function __construct(private RolPermisoService $rolPermisoService)
    {
    }

    public function index()
    {
        return response()->json([
            'success' => 'se listaron correctamente',
            'data' => $this->rolPermisoService->list()
        ]);
    }

    public function store(StoreRolPermisoRequest $request)
    {
        $data = $request->validated();

        if ($this->rolPermisoService->exists($data['rol_id'], $data['permiso_id'])) {
            return response()->json([
                'error' => 'ese permiso ya está asignado a este rol'
            ], 422);
        }

        $registroInsertado = $this->rolPermisoService->store($data);

        return response()->json([
            'success' => 'permiso asignado correctamente',
            'data' => $registroInsertado
        ]);
    }

    // La PK es compuesta (id_rol + id_permiso), así que "actualizar"
    // significa borrar la combinación anterior y crear la nueva.
    public function update(UpdateRolPermisoRequest $request, int $id_rol, int $id_permiso)
    {
        $data = $request->validated();

        $yaExiste = $this->rolPermisoService->exists($data['rol_id'], $data['permiso_id'])
            && ! ($data['rol_id'] == $id_rol && $data['permiso_id'] == $id_permiso);

        if ($yaExiste) {
            return response()->json([
                'error' => 'ese permiso ya está asignado a este rol'
            ], 422);
        }

        $this->rolPermisoService->destroy($id_rol, $id_permiso);
        $registroInsertado = $this->rolPermisoService->store($data);

        return response()->json([
            'success' => 'asignación actualizada correctamente',
            'data' => $registroInsertado
        ]);
    }

    public function destroy(int $id_rol, int $id_permiso)
    {
        $this->rolPermisoService->destroy($id_rol, $id_permiso);

        return response()->json([
            'success' => 'permiso removido correctamente'
        ]);
    }
}
