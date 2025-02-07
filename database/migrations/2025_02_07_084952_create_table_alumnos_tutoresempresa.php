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
        Schema::create('table_alumnos_tutoresempresa', function (Blueprint $table) {
            $table->id("id", 11);
            $table->foreignId("alumno_id", 11);
            $table->foreignId("tutorempresa_id", 11);
            $table->date("fecha_inicio");
            $table->date("fecha_fin");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_alumnos_tutoresempresa');
    }
};
