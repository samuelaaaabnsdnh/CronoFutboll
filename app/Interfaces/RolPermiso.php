<?php

namespace App\Http\Controllers;

use App\Models\RolPermiso;
use App\Models\Roles;
use App\Models\Permisos;
use Illuminate\Http\Request;

class RolPermisoController extends Controller
{
    public function index()
    {
        $asignaciones = RolPermiso::with(['rol', 'permiso'])->get();
        return view('roles-permisos.index', compact('asignaciones'));
    }

    public function create()
    {
        $roles = Roles::orderBy('nombre')->get();
        $permisos = Permisos::orderBy('nombre')->get();
        return view('roles-permisos.create', compact('roles', 'permisos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_rol'     => 'required|exists:roles,id_rol',
            'id_permiso' => 'required|exists:permisos,id_permiso',
        ]);

        $yaExiste = RolPermiso::where('id_rol', $data['id_rol'])
            ->where('id_permiso', $data['id_permiso'])
            ->exists();

        if ($yaExiste) {
            return back()->withErrors(['id_permiso' => 'Ese permiso ya está asignado a este rol.']);
        }

        RolPermiso::create($data);

        return redirect()->route('roles-permisos.index')->with('success', 'Permiso asignado correctamente.');
    }

    public function destroy($id_rol, $id_permiso)
    {
        RolPermiso::where('id_rol', $id_rol)->where('id_permiso', $id_permiso)->delete();
        return redirect()->route('roles-permisos.index')->with('success', 'Permiso removido correctamente.');
    }
}
