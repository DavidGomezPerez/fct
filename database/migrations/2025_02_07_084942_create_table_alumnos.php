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
        Schema::create('table_alumnos', function (Blueprint $table) {
            $table->id("id", 11);
            $table->string("nombre", 255);
            $table->string("apellidos", 255);
            $table->string("nif", 9);
            $table->string("nuss", 12);
            $table->string("email", 255);
            $table->string("telefono", 15);
            $table->date("fecha_nacimiento");
            $table->foreignId("tutoresinstituto_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_alumnos');
    }
};
