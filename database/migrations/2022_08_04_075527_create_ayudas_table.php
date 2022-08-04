<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAyudasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayudas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('body');
            $table->integer('helpable_id')->unsigned();
            $table->string('helpable_type');
            // $table->foreign('articulo_id')->references('id')->on('articulos');
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
        Schema::dropIfExists('ayudas');
    }
}
