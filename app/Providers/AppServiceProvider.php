<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Flaco
use App\Interfaces\RolInterface;
use App\Repositories\RolRepository;

use App\Interfaces\PermisoInterface;
use App\Repositories\PermisoRepository;

use App\Interfaces\UsuarioInterface;
use App\Repositories\UsuarioRepository;

use App\Interfaces\NotificacionInterface;
use App\Repositories\NotificacionRepository;

// Carolina
use App\Interfaces\RolPermisoInterface;
use App\Repositories\RolPermisoRepository;

use App\Interfaces\TorneoInterface;
use App\Repositories\TorneoRepository;

use App\Interfaces\EquipoInterface;
use App\Repositories\EquipoRepository;

// Samuel
use App\Interfaces\CanchaInterface;
use App\Repositories\CanchaRepository;

use App\Interfaces\ArbitroInterface;
use App\Repositories\ArbitroRepository;

use App\Interfaces\InscripcionInterface;
use App\Repositories\InscripcionRepository;

use App\Interfaces\JugadorInterface;
use App\Repositories\JugadorRepository;

// Juan
use App\Interfaces\PartidoInterface;
use App\Repositories\PartidoRepository;

use App\Interfaces\EstadisticaJugadorInterface;
use App\Repositories\EstadisticaJugadorRepository;

use App\Interfaces\ConvocatoriaInterface;
use App\Repositories\ConvocatoriaRepository;

use App\Interfaces\ConvocatoriaJugadorInterface;
use App\Repositories\ConvocatoriaJugadorRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RolInterface::class, RolRepository::class);
        $this->app->bind(PermisoInterface::class, PermisoRepository::class);
        $this->app->bind(UsuarioInterface::class, UsuarioRepository::class);
        $this->app->bind(NotificacionInterface::class, NotificacionRepository::class);

        $this->app->bind(RolPermisoInterface::class, RolPermisoRepository::class);
        $this->app->bind(TorneoInterface::class, TorneoRepository::class);
        $this->app->bind(EquipoInterface::class, EquipoRepository::class);

        $this->app->bind(CanchaInterface::class, CanchaRepository::class);
        $this->app->bind(ArbitroInterface::class, ArbitroRepository::class);
        $this->app->bind(InscripcionInterface::class, InscripcionRepository::class);
        $this->app->bind(JugadorInterface::class, JugadorRepository::class);

        $this->app->bind(PartidoInterface::class, PartidoRepository::class);
        $this->app->bind(EstadisticaJugadorInterface::class, EstadisticaJugadorRepository::class);
        $this->app->bind(ConvocatoriaInterface::class, ConvocatoriaRepository::class);
        $this->app->bind(ConvocatoriaJugadorInterface::class, ConvocatoriaJugadorRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}