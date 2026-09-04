<?php

namespace App\Http\Requests\Rol;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRolRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rolId = $this->route('rol');

        return [
            'nombre' => ['required', 'string', 'max:50', 'unique:roles,nombre,' . $rolId],
            'descripcion' => ['nullable', 'string', 'max:150'],
            'estado' => ['required', 'string', 'max:20'],
        ];
    }
}