<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArbitroController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CanchaController;
use App\Http\Controllers\ConvocatoriaController;
use App\Http\Controllers\ConvocatoriaJugadorController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\EstadisticaJugadorController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\RolPermisoController;
use App\Http\Controllers\TorneosController;
use App\Http\Controllers\UsuarioController;

// Autenticacion con Sanctum (tokens Bearer).
Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register'])->middleware('throttle:10,1');
    Route::post('login', [AuthController::class, 'login'])->middleware('throttle:5,1');

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('me', [AuthController::class, 'me']);
        Route::post('logout', [AuthController::class, 'logout']);
    });
});

// ---------------------------------------------------------------------
// Lectura publica: el frontend muestra torneos, equipos, jugadores,
// partidos, estadisticas e inscripciones aunque no se haya iniciado sesion.
// ---------------------------------------------------------------------
Route::apiResource('torneos', TorneosController::class)->only(['index', 'show']);
Route::apiResource('equipos', EquiposController::class)->only(['index', 'show']);
Route::apiResource('jugadores', JugadorController::class)->only(['index', 'show']);
Route::apiResource('partidos', PartidoController::class)->only(['index', 'show']);
Route::apiResource('estadisticas-jugadores', EstadisticaJugadorController::class)->only(['index', 'show']);
Route::apiResource('inscripciones', InscripcionController::class)->only(['index', 'show']);

// ---------------------------------------------------------------------
// Todo lo demas exige token Bearer (Sanctum).
// ---------------------------------------------------------------------
Route::middleware('auth:sanctum')->group(function () {
    // Crear / editar / borrar las entidades que el frontend deja leer en publico.
    Route::apiResource('torneos', TorneosController::class)->except(['index', 'show']);
    Route::apiResource('equipos', EquiposController::class)->except(['index', 'show']);
    Route::apiResource('jugadores', JugadorController::class)->except(['index', 'show']);
    Route::apiResource('partidos', PartidoController::class)->except(['index', 'show']);
    Route::apiResource('estadisticas-jugadores', EstadisticaJugadorController::class)->except(['index', 'show']);
    Route::apiResource('inscripciones', InscripcionController::class)->except(['index', 'show']);

    // Entidades que requieren sesion para todo (incluso para leer).
    Route::apiResource('roles', RolController::class);
    Route::apiResource('permisos', PermisoController::class);
    Route::apiResource('usuarios', UsuarioController::class);
    Route::apiResource('notificaciones', NotificacionController::class);
    Route::apiResource('canchas', CanchaController::class);
    Route::apiResource('arbitros', ArbitroController::class);
    Route::apiResource('convocatorias', ConvocatoriaController::class);
    Route::apiResource('convocatoria-jugadores', ConvocatoriaJugadorController::class);

    // RolPermiso tiene llave primaria compuesta (id_rol + id_permiso),
    // asi que no encaja en apiResource y se define a mano.
    Route::get('roles-permisos', [RolPermisoController::class, 'index']);
    Route::post('roles-permisos', [RolPermisoController::class, 'store']);
    Route::put('roles-permisos/{id_rol}/{id_permiso}', [RolPermisoController::class, 'update']);
    Route::patch('roles-permisos/{id_rol}/{id_permiso}', [RolPermisoController::class, 'update']);
    Route::delete('roles-permisos/{id_rol}/{id_permiso}', [RolPermisoController::class, 'destroy']);
});
