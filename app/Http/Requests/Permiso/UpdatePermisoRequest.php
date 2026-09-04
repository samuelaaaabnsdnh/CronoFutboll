<?php

namespace App\Http\Requests\Permiso;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePermisoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $permisoId = $this->route('permiso');

        return [
            'nombre' => ['required', 'string', 'max:100', 'unique:permisos,nombre,' . $permisoId],
            'descripcion' => ['nullable', 'string', 'max:200'],
            'estado' => ['required', 'string', 'max:20'],
        ];
    }
}