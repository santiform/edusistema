<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatedrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catedras', function (Blueprint $table) {
            $table->increments('id_catedra');
            $table->integer('id_materia');
            $table->integer('id_profesor');
            $table->integer('aula');
            $table->integer('cupos');
            $table->string('dia1');
            $table->string('hora_comienzo_dia1');
            $table->string('hora_finalizacion_dia1');
            $table->string('dia2');
            $table->string('hora_comienzo_dia2');
            $table->string('hora_finalizacion_dia2');
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
        Schema::dropIfExists('catedras');
    }
}