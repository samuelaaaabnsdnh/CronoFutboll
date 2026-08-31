<?php

namespace App\Repositories\Interfaces;

interface ArbitroRepositoryInterface extends BaseRepositoryInterface
{
    public function getByDocumento(string $documento);
    public function getByEstado(string $estado);
    public function getByExperiencia(int $experiencia);
}