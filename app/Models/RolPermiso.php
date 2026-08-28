<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RolPermiso extends Model
{
    protected $table = 'roles_permisos';

    // Eloquent no soporta claves primarias compuestas de forma nativa,
    // así que desactivamos el autoincremento y el manejo de PK simple.
    public $incrementing = false;
    protected $primaryKey = null;
    public $timestamps = false;

    protected $fillable = [
        'id_rol',
        'id_permiso',
    ];

    public function rol(): BelongsTo
    {
        return $this->belongsTo(Roles::class, 'id_rol', 'id_rol');
    }

    public function permiso(): BelongsTo
    {
        return $this->belongsTo(Permisos::class, 'id_permiso', 'id_permiso');
    }
}