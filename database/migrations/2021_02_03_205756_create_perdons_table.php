<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerdonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perdons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_perdon');
            $table->text('descripcion')->nullable();

            //Relacion con lector
            $table->unsignedBigInteger('lector_id')->unsigned();
            $table->foreign('lector_id')->references('id')->on('lectores');

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
        Schema::dropIfExists('perdons');
    }
}
