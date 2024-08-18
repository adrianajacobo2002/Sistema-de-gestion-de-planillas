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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('empleado_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('usuarios')->onDelete('cascade');
            $table->unsignedBigInteger('facultad_id');
            $table->foreign('facultad_id')->references('facultad_id')->on('facultades')->onDelete('cascade');
            $table->unsignedBigInteger('unidad_id');
            $table->foreign('unidad_id')->references('unidad_id')->on('unidades')->onDelete('cascade');
            $table->string('contrato', 100);
            $table->string('DUI', 20);
            $table->string('titulo', 100);
            $table->decimal('salario', 10, 2);
            $table->enum('estado', ['Activo', 'Inactivo']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
