<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConvocatoriaJugador\StoreConvocatoriaJugadorRequest;
use App\Http\Requests\ConvocatoriaJugador\UpdateConvocatoriaJugadorRequest;
use App\Services\ConvocatoriaJugadorService;

class ConvocatoriaJugadorController extends Controller
{
    protected ConvocatoriaJugadorService $convocatoriaJugadorService;

    public function __construct(ConvocatoriaJugadorService $convocatoriaJugadorService)
    {
        $this->convocatoriaJugadorService = $convocatoriaJugadorService;
    }

    public function index()
    {
        $convocatoriaJugadores = $this->convocatoriaJugadorService->list();

        return view('convocatoria_jugador.index', compact('convocatoriaJugadores'));
    }

    public function create()
    {
        return view('convocatoria_jugador.create');
    }

    public function store(StoreConvocatoriaJugadorRequest $request)
    {
        $this->convocatoriaJugadorService->store($request->validated());

        return redirect()->route('convocatoria_jugador.index')->with('success', 'Jugador convocado correctamente.');
    }

    public function edit(int $id)
    {
        $convocatoriaJugador = $this->convocatoriaJugadorService->show($id);

        return view('convocatoria_jugador.edit', compact('convocatoriaJugador'));
    }

    public function update(UpdateConvocatoriaJugadorRequest $request, int $id)
    {
        $this->convocatoriaJugadorService->update($id, $request->validated());

        return redirect()->route('convocatoria_jugador.index')->with('success', 'Convocatoria de jugador actualizada correctamente.');
    }

    public function destroy(int $id)
    {
        $this->convocatoriaJugadorService->destroy($id);

        return redirect()->route('convocatoria_jugador.index')->with('success', 'Jugador removido de la convocatoria.');
    }
}