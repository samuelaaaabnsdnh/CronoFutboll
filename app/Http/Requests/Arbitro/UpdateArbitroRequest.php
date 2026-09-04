<?php

namespace App\Http\Requests\Arbitro;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateArbitroRequest extends FormRequest
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
            'apellido' => [
                'sometimes',
                'required',
                'string',
                'max:100',
            ],
            'documento' => [
                'sometimes',
                'required',
                'string',
                'max:30',
                Rule::unique('arbitros', 'documento')->ignore($this->route('id')),
            ],
            'telefono' => [
                'sometimes',
                'nullable',
                'string',
                'max:20',
            ],
            'correo' => [
                'sometimes',
                'nullable',
                'email',
                'max:150',
            ],
            'experiencia' => [
                'sometimes',
                'nullable',
                'integer',
                'min:0',
            ],
            'estado' => [
                'sometimes',
                'required',
                'string',
                'max:20',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede superar los 100 caracteres.',
            'apellido.required' => 'El apellido es obligatorio.',
            'apellido.string' => 'El apellido debe ser texto.',
            'apellido.max' => 'El apellido no puede superar los 100 caracteres.',
            'documento.required' => 'El documento es obligatorio.',
            'documento.string' => 'El documento debe ser texto.',
            'documento.max' => 'El documento no puede superar los 30 caracteres.',
            'documento.unique' => 'Este documento ya está registrado.',
            'telefono.string' => 'El teléfono debe ser texto.',
            'telefono.max' => 'El teléfono no puede superar los 20 caracteres.',
            'correo.email' => 'El correo no tiene un formato válido.',
            'correo.max' => 'El correo no puede superar los 150 caracteres.',
            'experiencia.integer' => 'La experiencia debe ser un número entero.',
            'experiencia.min' => 'La experiencia no puede ser negativa.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.string' => 'El estado debe ser texto.',
            'estado.max' => 'El estado no puede superar los 20 caracteres.',
        ];
    }
}