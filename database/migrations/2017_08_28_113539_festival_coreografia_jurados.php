<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FestivalCoreografiaJurados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festival_coreografia_jurados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jurado')->unsigned();
            $table->integer('id_academia')->unsigned();
            $table->string('tipo');
            $table->integer('nota_01')->nullable();
            $table->integer('nota_02')->nullable();
            $table->integer('nota_03')->nullable();
            $table->integer('nota_04')->nullable();
            $table->integer('nota_05')->nullable();
            $table->integer('nota_06')->nullable();
            $table->text('comentario');

            $table->foreign('id_jurado')->references('id')
                ->on('festival_jurados')->onDelete('cascade');
            $table->foreign('id_academia')->references('id_academia')
                ->on('festival_coreografia')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('festival_coreografia_jurados');
    }
}
