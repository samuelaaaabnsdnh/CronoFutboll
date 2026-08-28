<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Equipos extends Model
{
    use HasFactory;

    protected $table = 'equipos';
    protected $primaryKey = 'id_equipo';

    protected $fillable = [
        'nombre',
        'entrenador',
        'telefono',
        'correo',
        'estado',
        'fecha_registro',
    ];

    protected function casts(): array
    {
        return [
            'fecha_registro' => 'datetime',
        ];
    }

    // Un equipo contiene muchos jugadores
    public function jugadores(): HasMany
    {
        return $this->hasMany(Jugadores::class, 'id_equipo', 'id_equipo');
    }

    // Un equipo tiene muchas inscripciones a torneos
    public function inscripciones(): HasMany
    {
        return $this->hasMany(Inscripciones::class, 'id_equipo', 'id_equipo');
    }

    // Partidos donde el equipo juega de local
    public function partidosLocal(): HasMany
    {
        return $this->hasMany(Partidos::class, 'equipo_local', 'id_equipo');
    }

    // Partidos donde el equipo juega de visitante
    public function partidosVisitante(): HasMany
    {
        return $this->hasMany(Partidos::class, 'equipo_visitante', 'id_equipo');
    }
}