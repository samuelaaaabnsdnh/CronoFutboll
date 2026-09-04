<?php

namespace App\Http\Requests\ConvocatoriaJugador;

use Illuminate\Foundation\Http\FormRequest;

class StoreConvocatoriaJugadorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'convocatoria_id' => ['required', 'integer', 'exists:convocatorias,id'],
            'jugador_id' => [
                'required',
                'integer',
                'exists:jugadores,id',
                'unique:convocatoria_jugador,jugador_id,NULL,id,convocatoria_id,' . $this->input('convocatoria_id'),
            ],
            'titular' => ['nullable', 'boolean'],
        ];
    }
}