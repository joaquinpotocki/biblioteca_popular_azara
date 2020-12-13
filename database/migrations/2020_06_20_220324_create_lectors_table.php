<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectores', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nombres');
            $table->string('apellidos');
            $table->string('sexo');
            $table->date('fecha_nacimiento');
            $table->string('cuil');
            $table->string('numero_lectores')->nullable();
            $table->string('telefono');
            $table->string('email');
            $table->text('notas_particulares')->nullable();
            $table->integer('reputacion');
            $table->integer('contador')->nullable();

            

            $table->unsignedBigInteger('direccion_id');
            $table->foreign('direccion_id')->references('id')->on('direccions');
            
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
        Schema::dropIfExists('lectors');
    }
}
