<?php
// app/Http/Requests/StoreEquiposRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquiposRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'     => 'required|string|max:100|unique:equipos,nombre',
            'entrenador' => 'nullable|string|max:150',
            'telefono'   => 'nullable|string|max:20',
            'correo'     => 'nullable|email|max:150',
            'estado'     => 'required|string|in:activo,inactivo',
        ];
    }
}