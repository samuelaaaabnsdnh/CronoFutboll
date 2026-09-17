<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstadísticaJugador\StoreEstadisticaJugadorRequest;
use App\Http\Requests\EstadísticaJugador\UpdateEstadisticaJugadorRequest;
use App\Services\EstadisticaJugadorService;

class EstadisticaJugadorController extends Controller
{
    protected EstadisticaJugadorService $estadisticaJugadorService;

    public function __construct(EstadisticaJugadorService $estadisticaJugadorService)
    {
        $this->estadisticaJugadorService = $estadisticaJugadorService;
    }

    public function index()
    {
        $estadisticas = $this->estadisticaJugadorService->list();

        return view('estadisticas_jugadores.index', compact('estadisticas'));
    }

    public function create()
    {
        return view('estadisticas_jugadores.create');
    }

    public function store(StoreEstadisticaJugadorRequest $request)
    {
        $this->estadisticaJugadorService->store($request->validated());

        return redirect()->route('estadisticas_jugadores.index')->with('success', 'Estadistica creada correctamente.');
    }

    public function edit(int $id)
    {
        $estadistica = $this->estadisticaJugadorService->show($id);

        return view('estadisticas_jugadores.edit', compact('estadistica'));
    }

    public function update(UpdateEstadisticaJugadorRequest $request, int $id)
    {
        $this->estadisticaJugadorService->update($id, $request->validated());

        return redirect()->route('estadisticas_jugadores.index')->with('success', 'Estadistica actualizada correctamente.');
    }

    public function destroy(int $id)
    {
        $this->estadisticaJugadorService->destroy($id);

        return redirect()->route('estadisticas_jugadores.index')->with('success', 'Estadistica eliminada correctamente.');
    }
}