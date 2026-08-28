<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Model
{
    protected $table = 'usuarios';

    public $timestamps = false;

    protected $fillable = [
        'rol_id',
        'nombre',
        'apellido',
        'email',
        'password',
        'telefono',
        'estado',
        'fecha_registro',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'fecha_registro' => 'datetime',
    ];

    public function rol(): BelongsTo
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    public function notificaciones(): HasMany
    {
        return $this->hasMany(Notificacion::class, 'usuario_id');
    }
}