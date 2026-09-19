<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArbitroController;
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

// CRUD estandar (index, store, show, update, destroy) para las 14 entidades
// que usan un id simple como llave primaria.
Route::apiResource('roles', RolController::class);
Route::apiResource('permisos', PermisoController::class);
Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('notificaciones', NotificacionController::class);

Route::apiResource('torneos', TorneosController::class);
Route::apiResource('equipos', EquiposController::class);

Route::apiResource('canchas', CanchaController::class);
Route::apiResource('arbitros', ArbitroController::class);
Route::apiResource('inscripciones', InscripcionController::class);
Route::apiResource('jugadores', JugadorController::class);

Route::apiResource('partidos', PartidoController::class);
Route::apiResource('estadisticas-jugadores', EstadisticaJugadorController::class);
Route::apiResource('convocatorias', ConvocatoriaController::class);
Route::apiResource('convocatoria-jugadores', ConvocatoriaJugadorController::class);

// RolPermiso tiene llave primaria compuesta (id_rol + id_permiso),
// asi que no encaja en apiResource y se define a mano.
Route::get('roles-permisos', [RolPermisoController::class, 'index']);
Route::post('roles-permisos', [RolPermisoController::class, 'store']);
Route::put('roles-permisos/{id_rol}/{id_permiso}', [RolPermisoController::class, 'update']);
Route::patch('roles-permisos/{id_rol}/{id_permiso}', [RolPermisoController::class, 'update']);
Route::delete('roles-permisos/{id_rol}/{id_permiso}', [RolPermisoController::class, 'destroy']);
