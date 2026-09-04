<?php

namespace App\Http\Requests\Convocatoria;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConvocatoriaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'partido_id' => ['sometimes', 'required', 'integer', 'exists:partidos,id'],
            'fecha' => ['sometimes', 'required', 'date'],
            'descripcion' => ['nullable', 'string', 'max:255'],
        ];
    }
}