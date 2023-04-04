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
        if(!Schema::hasTable('administrador')){
            Schema::create('administrador', function (Blueprint $table) {
                $table->id('idAdministrador');
                $table->unsignedBigInteger('idUser');
                $table->foreign('idUser')->references('idUser')->on('users')->onDelete('cascade');
                $table->string('cedula')->unique()->nullable();
                $table->string('nombres');
                $table->string('apellidos');
                $table->string('direccion')->nullable();
                $table->string('telefono')->nullable();
                $table->string('especialidad')->nullable();
                $table->string('Foto')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administrador');
    }
};
