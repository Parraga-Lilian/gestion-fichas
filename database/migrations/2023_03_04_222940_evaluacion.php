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
        Schema::create('evaluacion', function (Blueprint $table) {
            $table->increments('idEvaluacion');
            $table->unsignedBigInteger('idUser')->nullable();
            $table->foreign('idUser')->references('idUser')->on('users');
            $table->string('nusuario')->nullable();
            $table->string('codigo')->nullable();
            $table->string('nombre')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('preguntas')->nullable();
            $table->string('alternativas')->nullable();
            $table->string('respuestas')->nullable();
            $table->integer('npreguntas')->nullable();
            $table->double('puntajeobtenido')->nullable();
            $table->double('maximo')->nullable();
            $table->integer('tiempo')->nullable(); //en minutos
            $table->string('estado')->nullable();
            $table->index('idUser');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluacion');
    }
};
