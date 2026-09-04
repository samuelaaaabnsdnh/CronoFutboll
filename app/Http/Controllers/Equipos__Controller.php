<?php
// app/Http/Controllers/EquiposController.php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEquiposRequest;
use App\Http\Requests\UpdateEquiposRequest;
use App\Models\Equipos;

class EquiposController extends Controller
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

    public function store(StoreEquipoRequest $request)
    {
        $data = $request->validated();
        $data['fecha_registro'] = now();

        Equipos::create($data);

        return redirect()->route('equipos.index')->with('success', 'Equipo registrado correctamente.');
    }

    public function edit(Equipos $equipo)
    {
        return view('equipos.edit', compact('equipo'));
    }

    public function update(UpdateEquipoRequest $request, Equipos $equipo)
    {
        $equipo->update($request->validated());

        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado correctamente.');
    }

    public function destroy(Equipos $equipo)
    {
        $equipo->delete();

        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado correctamente.');
    }
}