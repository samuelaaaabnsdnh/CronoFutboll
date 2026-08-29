<?php

namespace App\Http\Controllers;

use App\Models\Torneos;
use Illuminate\Http\Request;

class TorneoController extends Controller
{
    public function index()
    {
        $torneos = Torneos::orderBy('fecha_inicio', 'desc')->paginate(10);
        return view('torneos.index', compact('torneos'));
    }

    public function create()
    {
        return view('torneos.create');
    }

    public function store(Request $request)
    {
        $data = $this->validarDatos($request);
        Torneos::create($data);

        return redirect()->route('torneos.index')->with('success', 'Torneo creado correctamente.');
    }

    public function edit(Torneos $torneo)
    {
        return view('torneos.edit', compact('torneo'));
    }

    public function update(Request $request, Torneos $torneo)
    {
        $data = $this->validarDatos($request);
        $torneo->update($data);

        return redirect()->route('torneos.index')->with('success', 'Torneo actualizado correctamente.');
    }

    public function destroy(Torneos $torneo)
    {
        $torneo->delete();
        return redirect()->route('torneos.index')->with('success', 'Torneo eliminado correctamente.');
    }

    private function validarDatos(Request $request): array
    {
        return $request->validate([
            'nombre'       => 'required|string|max:150',
            'categoria'    => 'nullable|string|max:50',
            'descripcion'  => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin'    => 'required|date|after_or_equal:fecha_inicio',
            'estado'       => 'required|in:programado,en_curso,finalizado,cancelado',
        ]);
    }
}