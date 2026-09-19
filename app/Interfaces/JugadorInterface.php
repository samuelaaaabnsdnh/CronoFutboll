<?php

namespace App\Interfaces;

interface JugadorInterface extends BaseRepositoryInterface
{
    public function getByDocumento(string $documento);

    public function getByPosicion(string $posicion);

    public function getByEstado(string $estado);
}
