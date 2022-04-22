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
        Schema::create('base_datos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyecto_id')->constrained();
            $table->string('nombre');
            $table->string('host');
            $table->string('contrasenha');
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
        Schema::dropIfExists('base_datos');
    }
};
