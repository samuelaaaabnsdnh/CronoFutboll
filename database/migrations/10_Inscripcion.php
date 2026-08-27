<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("torneo_id");
            $table->unsignedBigInteger("equipo_id");

            $table->dateTime("fecha_inscripcion");
            $table->string("estado", 30);

            $table->foreign("torneo_id")->references("id")->on("torneos")->onDelete("cascade");

            $table->foreign("equipo_id")->references("id")->on("equipos")->onDelete("cascade");

            $table->unique(["torneo_id", "equipo_id"]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("inscripciones");
    }
};
