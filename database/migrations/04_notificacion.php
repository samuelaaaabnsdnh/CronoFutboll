<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('usuario_id');
            $table->string('titulo', 150);
            $table->text('mensaje');
            $table->dateTime('fecha_envio');
            $table->boolean('leida');

            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notificaciones');
    }
};