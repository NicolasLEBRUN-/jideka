<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expositions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->text('description');
            $table->dateTime('date_debut');
            $table->dateTime('date_fin');
            $table->dateTime('date_vernissage')->nullable();
            $table->text('lieu');
            $table->text('chemin_visuel');
            $table->boolean('actif')->default(1);
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
        Schema::dropIfExists('expositions');
    }
}
