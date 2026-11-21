<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RolPermiso extends Model
{
    use SoftDeletes;

    protected $table = 'roles_permisos';

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