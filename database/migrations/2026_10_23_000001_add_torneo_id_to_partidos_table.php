<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Relaciona cada partido con el torneo al que pertenece.
     * Es nullable para no romper los partidos que ya existen.
     */
    public function up(): void
    {
        if (Schema::hasColumn('partidos', 'torneo_id')) {
            return;
        }

        Schema::table('partidos', function (Blueprint $table) {
            $table->unsignedBigInteger('torneo_id')->nullable()->after('id');
            $table->foreign('torneo_id')->references('id')->on('torneos')->nullOnDelete();
        });
    }

    public function down(): void
    {
        if (! Schema::hasColumn('partidos', 'torneo_id')) {
            return;
        }

        Schema::table('partidos', function (Blueprint $table) {
            $table->dropForeign(['torneo_id']);
            $table->dropColumn('torneo_id');
        });
    }
};
