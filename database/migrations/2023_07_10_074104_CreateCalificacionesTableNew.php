<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionesTableNew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->increments('id_examen');
            $table->integer('dni');
            $table->integer('id_materia');
            $table->integer('nota_cuatri1');
            $table->integer('nota_cuatri2');
            $table->date('fecha_final');
            $table->integer('nota_final');
            $table->string('tomo');
            $table->integer('pagina');
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
        Schema::dropIfExists('calificaciones');
    }
}