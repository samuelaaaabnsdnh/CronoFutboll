<?php

namespace App\Http\Requests\Jugador;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateJugadorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'equipo_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:equipos,id',
            ],
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
                Rule::unique('jugadores', 'documento')->ignore($this->route('id')),
            ],
            'fecha_nacimiento' => [
                'sometimes',
                'required',
                'date',
            ],
            'posicion' => [
                'sometimes',
                'nullable',
                'string',
                'max:50',
            ],
            'numero_camiseta' => [
                'sometimes',
                'nullable',
                'integer',
                'min:0',
            ],
            'telefono' => [
                'sometimes',
                'nullable',
                'string',
                'max:20',
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
            'equipo_id.required' => 'El equipo es obligatorio.',
            'equipo_id.integer' => 'El ID del equipo debe ser un número entero.',
            'equipo_id.exists' => 'El equipo seleccionado no existe.',
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
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento no tiene un formato válido.',
            'posicion.string' => 'La posición debe ser texto.',
            'posicion.max' => 'La posición no puede superar los 50 caracteres.',
            'numero_camiseta.integer' => 'El número de camiseta debe ser un número entero.',
            'numero_camiseta.min' => 'El número de camiseta no puede ser negativo.',
            'telefono.string' => 'El teléfono debe ser texto.',
            'telefono.max' => 'El teléfono no puede superar los 20 caracteres.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.string' => 'El estado debe ser texto.',
            'estado.max' => 'El estado no puede superar los 20 caracteres.',
        ];
    }
}