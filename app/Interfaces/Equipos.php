<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipos::orderBy('nombre')->paginate(10);
        return view('equipos.index', compact('equipos'));
    }

    public function create()
    {
        return view('equipos.create');
    }

    public function store(Request $request)
    {
        $data = $this->validarDatos($request);
        $data['fecha_registro'] = now();

        Equipos::create($data);

        return redirect()->route('equipos.index')->with('success', 'Equipo registrado correctamente.');
    }

    public function edit(Equipos $equipo)
    {
        return view('equipos.edit', compact('equipo'));
    }

    public function update(Request $request, Equipos $equipo)
    {
        $data = $this->validarDatos($request, $equipo->id_equipo);
        $equipo->update($data);

        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado correctamente.');
    }

    public function destroy(Equipos $equipo)
    {
        $equipo->delete();
        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado correctamente.');
    }

    private function validarDatos(Request $request, $idExcluir = null): array
    {
        return $request->validate([
            'nombre'     => 'required|string|max:100',
            'entrenador' => 'nullable|string|max:150',
            'telefono'   => 'nullable|string|max:20',
            'correo'     => 'nullable|email|max:150',
            'estado'     => 'required|in:activo,inactivo',
        ]);
    }
}