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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('dni')->nullable();
            $table->string('numero_ss')->nullable();
            $table->date('fecha_comienzo')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->string('doc_confidencialidad')->nullable();
            $table->string('doc_normas')->nullable();
            $table->string('doc_prevencion_riesgos')->nullable();
            $table->string('doc_reglamento_interno')->nullable();
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
        Schema::dropIfExists('empleados');
    }
};
