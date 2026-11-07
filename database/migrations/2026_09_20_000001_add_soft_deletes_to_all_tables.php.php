<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private array $tablas = [
        'roles',
        'permisos',
        'usuarios',
        'equipos',
        'torneos',
        'canchas',
        'arbitros',
        'jugadores',
        'inscripciones',
        'partidos',
        'estadisticas_jugadores',
        'convocatorias',
        'convocatoria_jugador',
        'notificaciones',
    ];

    public function up(): void
    {
        foreach ($this->tablas as $tabla) {
            Schema::table($tabla, function (Blueprint $table) use ($tabla) {
                if (!Schema::hasColumn($tabla, 'deleted_at')) {
                    $table->softDeletes();
                }
            });
        }

        if (!Schema::hasColumn('roles_permisos', 'id')) {
            // 1. Desactivamos temporalmente la revisión de claves foráneas
            Schema::disableForeignKeyConstraints();

            // 2. Eliminamos las foreign keys existentes en roles_permisos
            // (Ajusta los nombres si tus FKs se llaman distinto, o elimina vía Blueprint)
            Schema::table('roles_permisos', function (Blueprint $table) {
                // Laravel suele nombrarlas: tabla_columna_foreign
                $table->dropForeign(['rol_id']);
                $table->dropForeign(['permiso_id']);
            });

            // 3. Modificamos la PRIMARY KEY añadiendo el ID autoincremental
            DB::statement('ALTER TABLE roles_permisos DROP PRIMARY KEY, ADD COLUMN id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY FIRST');

            // 4. Restauramos las llaves foráneas y agregamos un índice UNIQUE para evitar combinaciones duplicadas
            Schema::table('roles_permisos', function (Blueprint $table) {
                $table->foreign('rol_id')->references('id')->on('roles')->onDelete('cascade');
                $table->foreign('permiso_id')->references('id')->on('permisos')->onDelete('cascade');
                $table->unique(['rol_id', 'permiso_id']);
            });

            // Reactivamos la revisión de llaves foráneas
            Schema::enableForeignKeyConstraints();
        }

        Schema::table('roles_permisos', function (Blueprint $table) {
            if (!Schema::hasColumn('roles_permisos', 'deleted_at')) {
                $table->softDeletes();
            }
        });
    }

    public function down(): void
    {
        Schema::table('roles_permisos', function (Blueprint $table) {
            if (Schema::hasColumn('roles_permisos', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });

        if (Schema::hasColumn('roles_permisos', 'id')) {
            Schema::disableForeignKeyConstraints();

            Schema::table('roles_permisos', function (Blueprint $table) {
                $table->dropForeign(['rol_id']);
                $table->dropForeign(['permiso_id']);
                $table->dropUnique(['rol_id', 'permiso_id']);
            });

            DB::statement('ALTER TABLE roles_permisos DROP COLUMN id, ADD PRIMARY KEY (rol_id, permiso_id)');

            Schema::table('roles_permisos', function (Blueprint $table) {
                $table->foreign('rol_id')->references('id')->on('roles')->onDelete('cascade');
                $table->foreign('permiso_id')->references('id')->on('permisos')->onDelete('cascade');
            });

            Schema::enableForeignKeyConstraints();
        }

        foreach ($this->tablas as $tabla) {
            Schema::table($tabla, function (Blueprint $table) use ($tabla) {
                if (Schema::hasColumn($tabla, 'deleted_at')) {
                    $table->dropSoftDeletes();
                }
            });
        }
    }
};