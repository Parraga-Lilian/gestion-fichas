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
        Schema::create('certificacion', function (Blueprint $table) {
            $table->increments('idCertificaciones');
            $table->unsignedBigInteger('idUser')->nullable();
            $table->foreign('idUser')->references('idUser')->on('users');
            $table->string('nombre')->nullable();
            $table->string('institucion')->nullable();
            $table->date('fechacomienzo')->nullable();
            $table->date('fechafin')->nullable();
            $table->string('tipo')->nullable();
            $table->string('archivo')->nullable();
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
        Schema::dropIfExists('certificacion');
    }
};
