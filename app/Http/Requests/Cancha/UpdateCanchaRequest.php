<?php

namespace App\Http\Requests\Cancha;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCanchaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'nombre' => [
                'sometimes',
                'required',
                'string',
                'max:100',
            ],
            'ubicacion' => [
                'sometimes',
                'required',
                'string',
                'max:200',
            ],
            'capacidad' => [
                'sometimes',
                'nullable',
                'integer',
                'min:1',
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
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede superar los 100 caracteres.',
            'ubicacion.required' => 'La ubicación es obligatoria.',
            'ubicacion.string' => 'La ubicación debe ser texto.',
            'ubicacion.max' => 'La ubicación no puede superar los 200 caracteres.',
            'capacidad.integer' => 'La capacidad debe ser un número entero.',
            'capacidad.min' => 'La capacidad debe ser mayor a 0.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.string' => 'El estado debe ser texto.',
            'estado.max' => 'El estado no puede superar los 30 caracteres.',
        ];
    }
}