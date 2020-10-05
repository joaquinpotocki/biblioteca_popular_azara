<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresoLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_libros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_ingreso');
            $table->date('fecha_perdida')->nullable();
            $table->string('cantidad');
            $table->string('descripcion_ingreso');

            //relacion entre libro e ingreso por proveedores
            $table->unsignedBigInteger('libro_id')->unsigned();
            $table->foreign('libro_id')->references('id')->on('libros');

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
        Schema::dropIfExists('ingreso_libros');
    }
}
