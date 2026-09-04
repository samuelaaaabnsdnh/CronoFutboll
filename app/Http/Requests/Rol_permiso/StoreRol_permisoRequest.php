<?php
// app/Http/Requests/StoreRolPermisoRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRolPermisoRequest extends FormRequest
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