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

    Schema::create('cursorealizado', function (Blueprint $table) {
        $table->increments('idCursosRealizados');
        $table->unsignedBigInteger('idUser')->nullable();
        $table->foreign('idUser')->references('idUser')->on('users');
        $table->string('nombre')->nullable();
        $table->string('lugar')->nullable();
        $table->string('tiempo')->nullable();
        $table->string('modalidad')->nullable();
        $table->date('fechaComienzo')->nullable();
        $table->date('fechaFin')->nullable();
        $table->string('firma')->nullable();
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
        Schema::dropIfExists('cursorealizado');
    }
};
