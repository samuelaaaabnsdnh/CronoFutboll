<?php
// app/Http/Requests/UpdateRolPermisoRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRolPermisoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_rol'     => 'required|exists:roles,id_rol',
            'id_permiso' => 'required|exists:permisos,id_permiso',
        ];
    }
}
