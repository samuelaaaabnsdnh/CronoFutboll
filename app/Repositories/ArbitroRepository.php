<?php

namespace App\Repositories;

use App\Interfaces\ArbitroInterface;
use App\Models\Arbitros;

class ArbitroRepository extends BaseRepository implements ArbitroInterface
{
    public function __construct(Arbitros $arbitroModel)
    {
        parent::__construct($arbitroModel);
    }

    public function getByDocumento(string $documento)
    {
        return $this->getByField('documento', $documento);
    }

    public function getByEstado(string $estado)
    {
        return $this->getByField('estado', $estado);
    }

    public function getByExperiencia(int $experiencia)
    {
        return $this->getByField('experiencia', $experiencia, '>=');
    }
}
