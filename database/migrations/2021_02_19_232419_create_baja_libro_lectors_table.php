<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBajaLibroLectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baja_libro_lectors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_baja_lector');
            $table->string('cantidad');
            $table->text('descripcion')->nullable();

            //relacion entre libro e ingreso por proveedores
            $table->unsignedBigInteger('libro_id')->unsigned();
            $table->foreign('libro_id')->references('id')->on('libros');
           
            //Relacion con lector
            $table->unsignedBigInteger('lector_id')->unsigned();
            $table->foreign('lector_id')->references('id')->on('lectores');

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
        Schema::dropIfExists('baja_libro_lectors');
    }
}
