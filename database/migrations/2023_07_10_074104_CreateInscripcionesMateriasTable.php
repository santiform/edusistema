<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionesMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones_materias', function (Blueprint $table) {
            $table->increments('id_inscripcion');
            $table->integer('dni');
            $table->integer('id_catedra');
            $table->string('condicion');
            $table->timestamps(); // Agregamos los campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscripciones_materias');
    }
}