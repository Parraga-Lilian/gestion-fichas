<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if(!Schema::hasTable('documento')){
            Schema::create('documento', function (Blueprint $table) {
                $table->id('idDocumento');
                //$table->foreignId('idEmpleado')->constrained()->cascadeOnDelete();
                $table->unsignedBigInteger('idEmpleado');
                $table->foreign('idEmpleado')->references('idEmpleado')->on('empleado');
                $table->string('tipo');
                $table->string('titulo');
                $table->string('asunto');
                $table->date('fecha');
                $table->string('emisor');
                $table->string('receptor');
                $table->string('cuerpo');
                $table->string('firma');
                $table->binary('archivo')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('documento');
    }
};
