<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBajaLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baja_libros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_baja');
            $table->string('cantidad');
            $table->string('descripcion')->nulleable();

            //Relacion con lector
            $table->unsignedBigInteger('lector_id')->unsigned();
            $table->foreign('lector_id')->references('id')->on('lectores')->nulleable();

            //relacion entre libro e ingreso por proveedores
            $table->unsignedBigInteger('libro_id')->unsigned();
            $table->foreign('libro_id')->references('id')->on('libros');

            //relacion entre tipo de bajas e ingreso de libros
            $table->unsignedBigInteger('tipo_bajas_id')->unsigned();
            $table->foreign('tipo_bajas_id')->references('id')->on('tipo_bajas');

            

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
        Schema::dropIfExists('baja_libros');
    }
}
