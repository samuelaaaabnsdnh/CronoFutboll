<?php

use App\Http\Controllers\Api\NotificacionController;
use App\Http\Controllers\Api\PermisoController;
use App\Http\Controllers\Api\RolController;
use App\Http\Controllers\Api\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::apiResource('roles', RolController::class);
Route::apiResource('permisos', PermisoController::class);
Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('notificaciones', NotificacionController::class);