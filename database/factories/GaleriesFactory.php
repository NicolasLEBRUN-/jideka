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
$factory->define(App\Galerie::class, function (Faker\Generator $faker) {
    return [
        'nom' => $faker->name,
        'description' => $faker->text,
        'chemin_visuel' => str_random(10),
        'actif' => 1,
    ];
});
