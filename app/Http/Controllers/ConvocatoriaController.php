<?php

namespace App\Http\Controllers;

use App\Http\Requests\Convocatoria\StoreConvocatoriaRequest;
use App\Http\Requests\Convocatoria\UpdateConvocatoriaRequest;
use App\Services\ConvocatoriaService;

class ConvocatoriaController extends Controller
{
    protected ConvocatoriaService $convocatoriaService;

    public function __construct(ConvocatoriaService $convocatoriaService)
    {
        $this->convocatoriaService = $convocatoriaService;
    }

    public function index()
    {
        $convocatorias = $this->convocatoriaService->list();

        return view('convocatorias.index', compact('convocatorias'));
    }

    public function create()
    {
        return view('convocatorias.create');
    }

    public function store(StoreConvocatoriaRequest $request)
    {
        $this->convocatoriaService->store($request->validated());

        return redirect()->route('convocatorias.index')->with('success', 'Convocatoria creada correctamente.');
    }

    public function edit(int $id)
    {
        $convocatoria = $this->convocatoriaService->show($id);

        return view('convocatorias.edit', compact('convocatoria'));
    }

    public function update(UpdateConvocatoriaRequest $request, int $id)
    {
        $this->convocatoriaService->update($id, $request->validated());

        return redirect()->route('convocatorias.index')->with('success', 'Convocatoria actualizada correctamente.');
    }

    public function destroy(int $id)
    {
        $this->convocatoriaService->destroy($id);

        return redirect()->route('convocatorias.index')->with('success', 'Convocatoria eliminada correctamente.');
    }
}