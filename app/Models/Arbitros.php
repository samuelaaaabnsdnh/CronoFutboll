<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Arbitros extends Model
{
    use HasFactory, SoftDeletes;

    protected $table="arbitros";

    public $timestamps = false;

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
