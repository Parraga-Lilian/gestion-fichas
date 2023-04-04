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
        if(!Schema::hasTable('empleado')){
        //
            Schema::create('empleado', function(Blueprint $table){
                $table->id('idEmpleado');
                $table->unsignedBigInteger('idUser')->nullable();
                $table->foreign('idUser')->references('idUser')->on('users');
                $table->string('cedula')->unique()->nullable();
                $table->string('nombres');
                $table->string('apellidos');
                $table->string('direccion')->nullable();
                $table->string('telefono')->nullable();
                $table->string('cargo')->nullable();
                $table->string('horario')->nullable();
                $table->string('seccion')->nullable();
                $table->string('estado')->nullable();
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
        Schema::dropIfExists('empleado');
    }
};
