<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Vincula un equipo (director tecnico) y un jugador con la cuenta de usuario
     * que lo creo. El frontend usa estas columnas para mostrar "Mi equipo" y
     * "Mi perfil" de cada rol. Son nullable para no romper los datos existentes.
     */
    public function up(): void
    {
        foreach (['equipos', 'jugadores'] as $tabla) {
            if (Schema::hasColumn($tabla, 'usuario_id')) {
                continue;
            }

            Schema::table($tabla, function (Blueprint $table) {
                $table->unsignedInteger('usuario_id')->nullable();
                $table->foreign('usuario_id')->references('id')->on('usuarios')->nullOnDelete();
            });
        }
    }

    public function down(): void
    {
        foreach (['equipos', 'jugadores'] as $tabla) {
            if (! Schema::hasColumn($tabla, 'usuario_id')) {
                continue;
            }

            Schema::table($tabla, function (Blueprint $table) use ($tabla) {
                $table->dropForeign([ 'usuario_id' ]);
                $table->dropColumn('usuario_id');
            });
        }
    }
};
