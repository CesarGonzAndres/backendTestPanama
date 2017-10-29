<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viajes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('viajero_id')->unsigned()->index();
            $table->foreign('viajero_id')->references('id')->on('viajeros')->onDelete('restrict')->onUpdate('restrict');
            $table->integer('destino_id')->unsigned()->index();
            $table->foreign('destino_id')->references('id')->on('destinos')->onDelete('restrict')->onUpdate('restrict');
            $table->integer('origen_id')->unsigned()->index();
            $table->foreign('origen_id')->references('id')->on('origens')->onDelete('restrict')->onUpdate('restrict');
            $table->string('cod_viaje')->unique();
            $table->integer('num_plazas');
            $table->date('fecha_realizacion');
            $table->string('descripcion');
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
        Schema::dropIfExists('viajes');
    }
}
