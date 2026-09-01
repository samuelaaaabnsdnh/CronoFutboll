<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles_permisos', function (Blueprint $table) {
            $table->unsignedInteger('rol_id');
            $table->unsignedInteger('permiso_id');

            $table->foreign('rol_id')->references('id')->on('roles')->cascadeOnDelete();
            $table->foreign('permiso_id')->references('id')->on('permisos')->cascadeOnDelete();

            $table->primary(['rol_id', 'permiso_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles_permisos');
    }
};