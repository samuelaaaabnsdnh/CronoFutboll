<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jugadores extends Model
{
    use HasFactory,SoftDeletes;

    protected $table="jugadores";
    public $timestamps = false;

    protected $fillable = [
        'equipo_id',
        'nombre',
        'apellido',
        'documento',
        'fecha_nacimiento',
        'posicion',
        'numero_camiseta',
        'telefono',
        'estado',
    ];

    protected $casts = [
        'estado'=> 'boolean'
    ];

    public function Equipos()
    {
        return $this->belongsTo(Equipos::class);
    }

    public function EstadisticasJugadores()
    {
        return $this->hasMany(EstadisticasJugadores::class);
    }

    public function ConvocatoriaJugadores()
    {
        return $this->belongsToMany(ConvocatoriaJugadores::class);
    }
}
