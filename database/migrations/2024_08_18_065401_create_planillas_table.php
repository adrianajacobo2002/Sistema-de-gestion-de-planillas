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
        Schema::create('planillas', function (Blueprint $table) {
            $table->id('planilla_id');
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id')->references('empleado_id')->on('empleados')->onDelete('cascade');
            $table->integer('anio');
            $table->enum('mes', [
                'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
            ]);
            $table->decimal('ISSS', 10, 2);
            $table->decimal('AFP', 10, 2);
            $table->decimal('ISR', 10, 2);
            $table->decimal('bono', 10, 2)->nullable();
            $table->integer('dias_laborados');
            $table->integer('horas_extras')->nullable();
            $table->decimal('descuentos_extra', 10, 2)->nullable();
            $table->decimal('salario_proporcional', 10, 2);
            $table->decimal('salario_liquido', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planillas');
    }
};
