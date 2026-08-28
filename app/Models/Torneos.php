<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Torneos extends Model
{
    use HasFactory;

    protected $table = 'torneos';
    protected $primaryKey = 'id_torneo';

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
        return $this->hasMany(Inscripciones::class, 'id_torneo', 'id_torneo');
    }

    // Un torneo realiza muchos partidos
    public function partidos(): HasMany
    {
        return $this->hasMany(Partidos::class, 'id_torneo', 'id_torneo');
    }

    // Un torneo agrupa estadísticas de jugadores
    public function estadisticasJugadores(): HasMany
    {
        return $this->hasMany(EstadisticasJugadores::class, 'id_torneo', 'id_torneo');
    }
}