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

            //relacion entre proveedor e ingreso de libros
            $table->unsignedBigInteger('proveedor_id')->unsigned();
            $table->foreign('proveedor_id')->references('id')->on('proveedores');

            //relacion entre proveedor e ingreso de libros
            $table->unsignedBigInteger('tipo_ingresos_id')->unsigned();
            $table->foreign('tipo_ingresos_id')->references('id')->on('tipo_ingresos');

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
