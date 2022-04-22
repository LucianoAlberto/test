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
        Schema::create('email_corporativos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyecto_id')->constrained();
            $table->string('email');
            $table->string('contrasenha');
            $table->string('ruta_acceso');
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
        Schema::dropIfExists('email_corporativos');
    }
};
