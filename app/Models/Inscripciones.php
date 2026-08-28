<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inscripciones extends Model
{
    use HasFactory;

    protected $table="inscripciones";
    
    protected $fillable =[
        'fecha_inscripcion',
        'estado',
        'torneo_id',
        'equipo_id',
    ];

    protected $casts = [
        'estado'=> 'boolean'
    ];

    public function Torneos()
    {
        return $this->belongsTo(Torneos::class);
    }

    public function Equipos()
    {
        return $this->belongsTo(Equipos::class);
    }


}
