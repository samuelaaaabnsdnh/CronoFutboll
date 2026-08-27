<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rol_id');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('email', 150)->unique();
            $table->string('password', 255);
            $table->string('telefono', 20)->nullable();
            $table->string('estado', 20);
            $table->dateTime('fecha_registro');

            $table->foreign('rol_id')->references('id')->on('roles');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};