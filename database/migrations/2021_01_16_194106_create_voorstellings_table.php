<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoorstellingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voorstellings', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('prijs', $scale = 4);
            $table->dateTime('tijd');
            $table->integer('gereserveerd');
            $table->integer('film_id')->unsigned();
            $table->integer('zaal_id')->unsigned();
            $table->timestamps();

            $table->foreign('film_id')->references('id')->on('films');
            $table->foreign('zaal_id')->references('id')->on('zaals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voorstellings');
    }
}
