<?php
// app/Http/Requests/UpdateEquiposRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEquiposRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'     => [
                'required', 'string', 'max:100',
                Rule::unique('equipos', 'nombre')->ignore($this->route('equipo')),
            ],
            'entrenador' => 'nullable|string|max:150',
            'telefono'   => 'nullable|string|max:20',
            'correo'     => 'nullable|email|max:150',
            'estado'     => 'required|string|in:activo,inactivo',
        ];
    }
}