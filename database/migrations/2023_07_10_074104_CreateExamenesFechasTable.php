<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenesFechasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenes_fechas', function (Blueprint $table) {
            $table->increments('id_fecha_examen');
            $table->integer('id_materia');
            $table->date('fecha');
            $table->string('hora_comienzo');
            $table->string('hora_finalizacion');
            $table->integer('id_presidente');
            $table->integer('id_vocal1');
            $table->integer('id_vocal2');
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
        Schema::dropIfExists('examenes_fechas');
    }
}