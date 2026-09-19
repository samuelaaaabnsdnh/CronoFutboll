<?php

namespace App\Interfaces;

interface ArbitroInterface extends BaseRepositoryInterface
{
    public function getByDocumento(string $documento);

    public function getByEstado(string $estado);

    public function getByExperiencia(int $experiencia);
}
