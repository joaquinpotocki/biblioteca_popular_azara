<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {  
            $table->bigIncrements('id');
            $table->string('numero_serie');
            $table->string('edicion');
            $table->string('nombre');
            $table->string('stock_libro');
            //Relacion con genero de los libros(Tu primer relacion en tu proyecto, VOS PODES!)
            $table->unsignedBigInteger('genero_id')->unsigned();
            $table->foreign('genero_id')->references('id')->on('genero_libros');
            //Relacio con autores de los libros
            $table->unsignedBigInteger('autor_id')->unsigned();
            $table->foreign('autor_id')->references('id')->on('autores');
            //Relacio con editoriales de los libros
            $table->unsignedBigInteger('editorial_id')->unsigned();
            $table->foreign('editorial_id')->references('id')->on('editorials');
            //Relacio con tipos de los libros
            $table->unsignedBigInteger('tipo_libro_id')->unsigned();
            $table->foreign('tipo_libro_id')->references('id')->on('tipo_libros');

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
        Schema::dropIfExists('libros');
    }
}
