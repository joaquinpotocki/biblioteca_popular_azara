<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccions', function (Blueprint $table) {
            $table->string('calle');
            $table->bigInteger('altura');
            $table->bigIncrements('id');

            $table->unsignedInteger('pais_id');
            $table->foreign('pais_id')->references('id')->on('paises');

            $table->unsignedInteger('provincia_id');
            $table->foreign('provincia_id')->references('id')->on('provincias');

            $table->unsignedInteger('localidad_id');
            $table->foreign('localidad_id')->references('id')->on('localidades');
            
            $table->softDeletes();
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direccions');
    }
}
