<?php
// app/Http/Controllers/RolPermisoController.php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRolPermisoRequest;
use App\Http\Requests\UpdateRolPermisoRequest;
use App\Models\Permiso;
use App\Models\Rol;
use App\Models\RolPermiso;

class RolPermisoController extends Controller
{
    public function index()
    {
        $asignaciones = RolPermiso::with(['rol', 'permiso'])->get();

        return view('roles-permisos.index', compact('asignaciones'));
    }

    public function create()
    {
        $roles = Rol::orderBy('nombre')->get();
        $permisos = Permiso::orderBy('nombre')->get();

        return view('roles-permisos.create', compact('roles', 'permisos'));
    }

    public function store(StoreRolPermisoRequest $request)
    {
        $data = $request->validated();

        $yaExiste = RolPermiso::where('rol_id', $data['rol_id'])
            ->where('permiso_id', $data['permiso_id'])
            ->exists();

        if ($yaExiste) {
            return back()->withErrors(['permiso_id' => 'Ese permiso ya está asignado a este rol.']);
        }

        RolPermiso::create($data);

        return redirect()->route('roles-permisos.index')->with('success', 'Permiso asignado correctamente.');
    }

    public function edit(int $rolId, int $permisoId)
    {
        $asignacion = RolPermiso::where('rol_id', $rolId)
            ->where('permiso_id', $permisoId)
            ->firstOrFail();

        $roles = Rol::orderBy('nombre')->get();
        $permisos = Permiso::orderBy('nombre')->get();

        return view('roles-permisos.edit', compact('asignacion', 'roles', 'permisos'));
    }

    public function update(UpdateRolPermisoRequest $request, int $rolId, int $permisoId)
    {
        RolPermiso::where('rol_id', $rolId)->where('permiso_id', $permisoId)->firstOrFail();

        $data = $request->validated();

        $yaExiste = RolPermiso::where('rol_id', $data['rol_id'])
            ->where('permiso_id', $data['permiso_id'])
            ->where(function ($query) use ($rolId, $permisoId) {
                $query->where('rol_id', '!=', $rolId)
                    ->orWhere('permiso_id', '!=', $permisoId);
            })
            ->exists();

        if ($yaExiste) {
            return back()->withErrors(['permiso_id' => 'Ese permiso ya está asignado a este rol.']);
        }

        // La PK es compuesta (rol_id + permiso_id), así que "actualizar"
        // significa borrar la combinación anterior y crear la nueva.
        RolPermiso::where('rol_id', $rolId)->where('permiso_id', $permisoId)->delete();
        RolPermiso::create($data);

        return redirect()->route('roles-permisos.index')->with('success', 'Asignación actualizada correctamente.');
    }

    public function destroy(int $rolId, int $permisoId)
    {
        RolPermiso::where('rol_id', $rolId)->where('permiso_id', $permisoId)->delete();

        return redirect()->route('roles-permisos.index')->with('success', 'Permiso removido correctamente.');
    }
}