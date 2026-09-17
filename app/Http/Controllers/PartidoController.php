<?php

namespace App\Http\Controllers;

use App\Http\Requests\Partido\StorePartidoRequest;
use App\Http\Requests\Partido\UpdatePartidoRequest;
use App\Services\PartidoService;

class PartidoController extends Controller
{
    protected PartidoService $partidoService;

    public function __construct(PartidoService $partidoService)
    {
        $this->partidoService = $partidoService;
    }

    public function index()
    {
        $partidos = $this->partidoService->list();

        return view('partidos.index', compact('partidos'));
    }

    public function create()
    {
        return view('partidos.create');
    }

    public function store(StorePartidoRequest $request)
    {
        $this->partidoService->store($request->validated());

        return redirect()->route('partidos.index')->with('success', 'Partido creado correctamente.');
    }

    public function edit(int $id)
    {
        $partido = $this->partidoService->show($id);

        return view('partidos.edit', compact('partido'));
    }

    public function update(UpdatePartidoRequest $request, int $id)
    {
        $this->partidoService->update($id, $request->validated());

        return redirect()->route('partidos.index')->with('success', 'Partido actualizado correctamente.');
    }

    public function destroy(int $id)
    {
        $this->partidoService->destroy($id);

        return redirect()->route('partidos.index')->with('success', 'Partido eliminado correctamente.');
    }
}