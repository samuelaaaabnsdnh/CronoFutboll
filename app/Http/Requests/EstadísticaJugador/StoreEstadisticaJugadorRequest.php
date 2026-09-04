<?php

namespace App\Http\Requests\EstadísticaJugador;

use Illuminate\Foundation\Http\FormRequest;

class StoreEstadisticaJugadorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'jugador_id' => ['required', 'integer', 'exists:jugadores,id'],
            'partido_id' => ['required', 'integer', 'exists:partidos,id'],
            'goles' => ['nullable', 'integer', 'min:0'],
            'asistencias' => ['nullable', 'integer', 'min:0'],
            'tarjetas_amarillas' => ['nullable', 'integer', 'min:0', 'max:2'],
            'tarjetas_rojas' => ['nullable', 'integer', 'min:0', 'max:1'],
            'minutos_jugados' => ['nullable', 'integer', 'min:0', 'max:120'],
        ];
    }
}