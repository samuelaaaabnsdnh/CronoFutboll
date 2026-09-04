<?php
// app/Http/Controllers/TorneosController.php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTorneosRequest;
use App\Http\Requests\UpdateTorneosRequest;
use App\Models\Torneos;

class TorneosController extends Controller
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

    public function store(StoreTorneoRequest $request)
    {
        Torneos::create($request->validated());

        return redirect()->route('torneos.index')->with('success', 'Torneo creado correctamente.');
    }

    public function edit(Torneos $torneo)
    {
        return view('torneos.edit', compact('torneo'));
    }

    public function update(UpdateTorneoRequest $request, Torneos $torneo)
    {
        $torneo->update($request->validated());

        return redirect()->route('torneos.index')->with('success', 'Torneo actualizado correctamente.');
    }

    public function destroy(Torneos $torneo)
    {
        $torneo->delete();

        return redirect()->route('torneos.index')->with('success', 'Torneo eliminado correctamente.');
    }
}