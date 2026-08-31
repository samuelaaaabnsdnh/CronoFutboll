<?php

namespace App\Repositories\Interfaces;

interface JugadorRepositoryInterface extends BaseRepositoryInterface
{
    public function getByDocumento(string $documento);
    public function getByPosicion(string $posicion);
    public function getByEstado(string $estado);
}