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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained();
            $table->string('concepto')->nullable();
            $table->string('referencia');
            $table->string('proveedor_dominio_usuario')->nullable();
            $table->string('proveedor_dominio_contrasenha')->nullable();
            $table->string('proveedor_hosting_usuario')->nullable();
            $table->string('proveedor_hosting_contrasenha')->nullable();
            $table->string('otros_datos')->nullable();
            $table->string('sepa')->nullable();
            $table->string('preferencias')->nullable();
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
        Schema::dropIfExists('proyectos');
    }
};
