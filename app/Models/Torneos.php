<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Torneos extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'torneos';


    protected $fillable = [
        'nombre',
        'categoria',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'estado',
    ];

    protected function casts(): array
    {
        return [
            'fecha_inicio' => 'date',
            'fecha_fin' => 'date',
        ];
    }

    // Un torneo recibe muchas inscripciones
    public function inscripciones(): HasMany
    {
        return $this->hasMany(Inscripciones::class, 'torneo_id');
    }

    // Un torneo realiza muchos partidos
    public function partidos(): HasMany
    {
        return $this->hasMany(Partidos::class, 'torneo_id');
    }

    // Un torneo agrupa estadísticas de jugadores
    public function estadisticasJugadores(): HasManyThrough
    {
        return $this->hasManyThrough(EstadisticasJugadores::class, Partidos::class, 'torneo_id', 'partido_id');
    }
}