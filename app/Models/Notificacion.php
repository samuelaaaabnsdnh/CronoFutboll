<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notificacion extends Model
{
    use SoftDeletes;

    protected $table = 'notificaciones';

    public $timestamps = false;

    protected $fillable = [
        'usuario_id',
        'titulo',
        'mensaje',
        'fecha_envio',
        'leida',
    ];

    protected $casts = [
        'fecha_envio' => 'datetime',
        'leida' => 'boolean',
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}