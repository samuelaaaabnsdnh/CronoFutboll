<?php

namespace App\Http\Requests\Inscripcion;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInscripcionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'torneo_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:torneos,id',
            ],
            'equipo_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:equipos,id',
            ],
            'fecha_inscripcion' => [
                'sometimes',
                'required',
                'date',
            ],
            'estado' => [
                'sometimes',
                'required',
                'string',
                'max:30',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'torneo_id.required' => 'El torneo es obligatorio.',
            'torneo_id.integer' => 'El ID del torneo debe ser un número entero.',
            'torneo_id.exists' => 'El torneo seleccionado no existe.',
            'equipo_id.required' => 'El equipo es obligatorio.',
            'equipo_id.integer' => 'El ID del equipo debe ser un número entero.',
            'equipo_id.exists' => 'El equipo seleccionado no existe.',
            'fecha_inscripcion.required' => 'La fecha de inscripción es obligatoria.',
            'fecha_inscripcion.date' => 'La fecha de inscripción no tiene un formato válido.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.string' => 'El estado debe ser texto.',
            'estado.max' => 'El estado no puede superar los 30 caracteres.',
        ];
    }
}