<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLibroMovimiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro_movimiento', function (Blueprint $table) {
            $table->bigIncrements('id');

            //Relacion con libro
            $table->unsignedBigInteger('libro_id')->unsigned();
            $table->foreign('libro_id')->references('id')->on('libros');

            //Relacio con proveedores de los libros
            $table->unsignedBigInteger('movimiento_id')->unsigned();
            $table->foreign('movimiento_id')->references('id')->on('movimientos');
            
            $table->softDeletes();
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
        Schema::dropIfExists('table_libro_movimiento');
    }
}
