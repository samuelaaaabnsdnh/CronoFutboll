<?php

namespace App\Http\Requests\Convocatoria;

use Illuminate\Foundation\Http\FormRequest;

class StoreConvocatoriaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'partido_id' => ['required', 'integer', 'exists:partidos,id'],
            'fecha' => ['required', 'date'],
            'descripcion' => ['nullable', 'string', 'max:255'],
        ];
    }
}