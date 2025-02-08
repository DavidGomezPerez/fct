<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alumno_tutoresempresa', function (Blueprint $table) {
            $table->id("id", 11);
            $table->foreignId("alumno_id", 11)->constrained("alumnos")->cascadeOnDelete();
            $table->foreignId("tutoresempresa_id", 11)->constrained("tutoresempresas")->cascadeOnDelete();
            $table->date("fecha_inicio")->nullable(false);
            $table->date("fecha_fin")->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumno_tutoresempresa');
    }
};