<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Convocatorias extends Model
{
    use HasFactory;

    protected $table = 'convocatorias';

    protected $fillable = [
        'partido_id',
        'fecha',
        'descripcion',
    ];

    protected function casts(): array
    {
        return [
            'fecha' => 'date',
        ];
    }

    public function partido(): BelongsTo
    {
        return $this->belongsTo(Partidos::class, 'partido_id');
    }

    public function jugadores(): BelongsToMany
    {
        return $this->belongsToMany(Jugadores::class, 'convocatoria_jugador', 'convocatoria_id', 'jugador_id')
            ->withPivot('titular')
            ->withTimestamps();
    }

    public function convocatoriaJugadores(): HasMany
    {
        return $this->hasMany(ConvocatoriaJugadores::class, 'convocatoria_id');
    }
}