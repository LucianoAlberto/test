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
        Schema::create('practicas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained();
            $table->string('instituto');
            $table->string('localidad');
            $table->string('provincia');
            $table->string('tutor_practicas');
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->string('convenio')->nullable();
            $table->string('doc_confidencialidad')->nullable();
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
        Schema::dropIfExists('practicas');
    }
};
