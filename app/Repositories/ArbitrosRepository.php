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
        $arbitro = $this->model->where("documento", $documento)
                                ->get();

        if ($arbitro->isEmpty()) {
            return null;
        }
        return $arbitro;
    }

    public function getByEstado(string $estado)
    {
        $arbitro = $this->model->where("estado", $estado)
                                ->get();

        if ($arbitro->isEmpty()) {
            return null;
        }
        return $arbitro;
    }

    public function getByExperiencia(int $experiencia)
    {
        $arbitro = $this->model->where("experiencia", ">=", $experiencia)
                                ->get();

        if ($arbitro->isEmpty()) {
            return null;
        }
        return $arbitro;
    }
}