<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipos extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'equipos';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'entrenador',
        'telefono',
        'correo',
        'estado',
        'fecha_registro',
        'usuario_id',
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
        return $this->hasMany(Jugadores::class, 'equipo_id');
    }

    // Un equipo tiene muchas inscripciones a torneos
    public function inscripciones(): HasMany
    {
        return $this->hasMany(Inscripciones::class, 'equipo_id');
    }

    // Partidos donde el equipo juega de local
    public function partidosLocal(): HasMany
    {
        return $this->hasMany(Partidos::class, 'equipo_local_id');
    }

    // Partidos donde el equipo juega de visitante
    public function partidosVisitante(): HasMany
    {
        return $this->hasMany(Partidos::class, 'equipo_visitante_id');
    }
}