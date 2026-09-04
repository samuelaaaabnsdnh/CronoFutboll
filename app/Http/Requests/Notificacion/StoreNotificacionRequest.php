<?php

namespace App\Http\Requests\Notificacion;

use Illuminate\Foundation\Http\FormRequest;

class StoreNotificacionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'usuario_id' => ['required', 'exists:usuarios,id'],
            'titulo' => ['required', 'string', 'max:150'],
            'mensaje' => ['required', 'string'],
            'fecha_envio' => ['required', 'date'],
            'leida' => ['required', 'boolean'],
        ];
    }
}