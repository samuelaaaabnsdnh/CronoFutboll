<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Partidos extends Model
{
    use HasFactory;

    protected $table = 'partidos';

    protected $fillable = [
        'equipo_local_id',
        'equipo_visitante_id',
        'fecha',
        'hora',
        'lugar',
        'goles_local',
        'goles_visitante',
        'estado',
    ];

    protected function casts(): array
    {
        return [
            'fecha' => 'date',
        ];
    }

    public function equipoLocal(): BelongsTo
    {
        return $this->belongsTo(Equipos::class, 'equipo_local_id');
    }

    public function equipoVisitante(): BelongsTo
    {
        return $this->belongsTo(Equipos::class, 'equipo_visitante_id');
    }

    public function estadisticasJugadores(): HasMany
    {
        return $this->hasMany(EstadisticasJugadores::class, 'partido_id');
    }

    public function convocatorias(): HasMany
    {
        return $this->hasMany(Convocatorias::class, 'partido_id');
    }
}