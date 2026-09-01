<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EstadisticasJugadores extends Model
{
    use HasFactory;

    protected $table = 'estadisticas_jugadores';

    protected $fillable = [
        'jugador_id',
        'partido_id',
        'goles',
        'asistencias',
        'tarjetas_amarillas',
        'tarjetas_rojas',
        'minutos_jugados',
    ];

    protected function casts(): array
    {
        return [
            'goles' => 'integer',
            'asistencias' => 'integer',
            'tarjetas_amarillas' => 'integer',
            'tarjetas_rojas' => 'integer',
            'minutos_jugados' => 'integer',
        ];
    }

    public function jugador(): BelongsTo
    {
        return $this->belongsTo(Jugadores::class, 'jugador_id');
    }

    public function partido(): BelongsTo
    {
        return $this->belongsTo(Partidos::class, 'partido_id');
    }
}