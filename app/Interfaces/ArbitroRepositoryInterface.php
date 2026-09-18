<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Models\Arbitro;
use Illuminate\Support\Collection;

interface ArbitroRepositoryInterface extends BaseInterface
{
    
    public function getByDocumento(string $documento): ?Arbitro;

    
    public function getAllByEstado(string $estado): Collection;

    
    public function getAllByExperiencia(int $experiencia): Collection;
}