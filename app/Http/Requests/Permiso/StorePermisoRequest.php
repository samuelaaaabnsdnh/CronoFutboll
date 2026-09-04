<?php

namespace App\Http\Requests\Permiso;

use Illuminate\Foundation\Http\FormRequest;

class StorePermisoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:100', 'unique:permisos,nombre'],
            'descripcion' => ['nullable', 'string', 'max:200'],
            'estado' => ['required', 'string', 'max:20'],
        ];
    }
}