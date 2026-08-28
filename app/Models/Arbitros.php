<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Arbitros extends Model
{
    use HasFactory;

    protected $table="arbitros";

    protected $fillable =[
        'nombre',
        'apellido',
        'documento',
        'telefono',
        'correo',
        'experiencia',
        'estado',
    ];

    protected $casts = [
        'estado' => 'boolean'
    ];

    public function partidos()
{
    return $this->hasMany(Partido::class);
}
}
