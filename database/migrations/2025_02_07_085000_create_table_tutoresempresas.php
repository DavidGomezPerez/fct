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
        Schema::create('tutoresempresas', function (Blueprint $table) {
            $table->id("id", 11);
            $table->string("nombre", 255);
            $table->string("apellidos", 255);
            $table->string("email", 255)->unique();
            $table->foreignId("empresa_id", 11)->constrained("empresas")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutoresempresas');
    }
};
