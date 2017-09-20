<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Oeuvre::class, function (Faker\Generator $faker) {

	// Récupération des Ids des galeries pour lier les oeuvres aux galeries
	$galeriesIds = DB::table('galeries')->pluck('id')->all();

    return [
    	'nom' => $faker->name,
        'description' => $faker->text,
        'technique' => str_random(10),
        'annee' => $faker->numberBetween($min = 2000, $max = 2017),
        'hauteur' => $faker->numberBetween($min = 10, $max = 200),
        'largeur' => $faker->numberBetween($min = 10, $max = 200),
        'profondeur' => $faker->numberBetween($min = 1, $max = 6),
        'prix' => $faker->numberBetween($min = 100, $max = 500),
        'disponibilite' => $faker->boolean($chanceOfGettingTrue = 75),
        'chemin_image' => str_random(10),
        'galerie_id' => $faker->randomElement($galeriesIds),
        'actif' => 1,
    ];
});
