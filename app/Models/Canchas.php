<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Canchas extends Model
{
    use HasFactory,SoftDeletes;

    protected $table="canchas";

    public $timestamps = false;

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
