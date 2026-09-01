<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConvocatoriaJugadores extends Model
{
    use HasFactory;

    protected $table = 'convocatoria_jugador';

    protected $fillable = [
        'convocatoria_id',
        'jugador_id',
        'titular',
    ];

    protected function casts(): array
    {
        return [
            'titular' => 'boolean',
        ];
    }

    public function convocatoria(): BelongsTo
    {
        return $this->belongsTo(Convocatorias::class, 'convocatoria_id');
    }

    public function jugador(): BelongsTo
    {
        return $this->belongsTo(Jugadores::class, 'jugador_id');
    }
}