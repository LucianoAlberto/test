<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->smallInteger('importe_total');
            $table->smallInteger('importe_pagado');
            $table->date('fecha_pago');
            $table->smallInteger('horas_alta_ss');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nominas');
    }
};
