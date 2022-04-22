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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('dni')->nullable();
            $table->integer('anho_contable')->nullable();
            $table->string('direccion_fiscal')->nullable();
            $table->string('domicilio')->nullable();
            $table->string('nombre_comercial')->nullable();
            $table->string('nombre_sociedad')->nullable();
            $table->string('cif')->nullable();
            $table->string('cuenta_bancaria')->nullable();
            $table->biginteger('n_tarjeta')->nullable();
            $table->string('email')->nullable();
            $table->biginteger('telefono')->nullable();
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
        Schema::dropIfExists('clientes');
    }
};
