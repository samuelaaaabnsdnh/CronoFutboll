<?php

namespace App\Http\Requests\ConvocatoriaJugador;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConvocatoriaJugadorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'convocatoria_id' => ['sometimes', 'required', 'integer', 'exists:convocatorias,id'],
            'jugador_id' => ['sometimes', 'required', 'integer', 'exists:jugadores,id'],
            'titular' => ['nullable', 'boolean'],
        ];
    }
}