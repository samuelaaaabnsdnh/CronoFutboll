<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("equipo_id");

            $table->string("nombre", 100);
            $table->string("apellido", 100);
            $table->string("documento", 30)->unique();
            $table->date("fecha_nacimiento");
            $table->string("posicion", 50)->nullable();
            $table->integer("numero_camiseta")->nullable();
            $table->string("telefono", 20)->nullable();
            $table->string("estado", 20);

            $table->foreign("equipo_id")->references("id")->on("equipos")->onDelete("cascade");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("jugadores");
    }
};