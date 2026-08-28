<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Canchas extends Model
{
    use HasFactory;

    protected $table="canchas";

    protected $fillable =[
        'nombre',
        'ubicacion',
        'capacidad',
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
