<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOeuvresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oeuvres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->text('description');
            $table->string('technique');
            $table->smallInteger('annee');
            $table->smallInteger('hauteur');
            $table->smallInteger('largeur');
            $table->smallInteger('profondeur');
            $table->integer('prix');
            $table->tinyInteger('disponibilite_id');
            $table->integer('galerie_id');
            $table->text('chemin_image');
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
        Schema::dropIfExists('oeuvres');
    }
}
