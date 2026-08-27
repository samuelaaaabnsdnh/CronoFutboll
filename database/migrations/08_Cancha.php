<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('canchas', function (Blueprint $table) {
            $table->id();
            $table->string("nombre", 100);
            $table->string("ubicacion", 200);
            $table->integer("capacidad")->nullable();
            $table->string("estado", 30);
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists("canchas");
    }
};