<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditorialProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editorial_proveedor', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('editorial_id')->unsigned();
            $table->foreign('editorial_id')->references('id')->on('editorials');
            //Relacio con proveedores de los libros
            $table->unsignedBigInteger('proveedor_id')->unsigned();
            $table->foreign('proveedor_id')->references('id')->on('proveedores');
            

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
        Schema::dropIfExists('editorial_proveedor');
    }
}
