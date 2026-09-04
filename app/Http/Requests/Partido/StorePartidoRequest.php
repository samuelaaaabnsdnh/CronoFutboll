<?php

namespace App\Http\Requests\Partido;

use Illuminate\Foundation\Http\FormRequest;

class StorePartidoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'equipo_local_id' => ['required', 'integer', 'exists:equipos,id'],
            'equipo_visitante_id' => ['required', 'integer', 'exists:equipos,id', 'different:equipo_local_id'],
            'fecha' => ['required', 'date'],
            'hora' => ['nullable', 'date_format:H:i'],
            'lugar' => ['nullable', 'string', 'max:255'],
            'goles_local' => ['nullable', 'integer', 'min:0'],
            'goles_visitante' => ['nullable', 'integer', 'min:0'],
            'estado' => ['required', 'string', 'in:programado,en_curso,finalizado,cancelado'],
        ];
    }
}