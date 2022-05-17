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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained();
            $table->foreignId('concepto_facturas_id')->constrained()->nullable();
            $table->string('referencia')->unique();
            $table->decimal('base_imponible', 8, 2)->nullable();
            $table->decimal('iva', 5, 2)->nullable();
            $table->decimal('irpf', 5, 2)->nullable();
            $table->decimal('total', 8, 2)->nullable();
            $table->date('fecha_firma')->nullable();
            $table->string('archivo')->nullable();
            $table->string('presupuesto')->nullable();

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
        Schema::dropIfExists('contratos');
    }
};
