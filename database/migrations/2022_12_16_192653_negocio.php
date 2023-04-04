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
        if(!Schema::hasTable('negocio')){
            Schema::create('negocio', function (Blueprint $table) {
                $table->id('idNegocio');
                $table->string('ruc_asoc');
                $table->string('razon_social');
                $table->string('actividad');
                $table->string('correo');
                $table->string('direccion');
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
        Schema::dropIfExists('negocio');
    }
};
