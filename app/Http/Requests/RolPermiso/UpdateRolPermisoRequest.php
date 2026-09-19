<?php
// app/Http/Requests/UpdateRolPermisoRequest.php

namespace App\Http\Requests\RolPermiso;

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
            'rol_id'     => 'required|integer|exists:roles,id',
            'permiso_id' => 'required|integer|exists:permisos,id',
        ];
    }
}
