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
$factory->define(App\Exposition::class, function (Faker\Generator $faker) {
    return [
        'nom' => $faker->name,
        'description' => $faker->text,
        'date_debut' => $faker->time($format = 'Y-m-d H:i:s', $max = 'now'),
        'date_fin' => $faker->time($format = 'Y-m-d H:i:s', $max = 'now'),
        'date_debut_vernissage' => $faker->time($format = 'Y-m-d H:i:s', $max = 'now'),
        'lieu' => $faker->address,
        'chemin_visuel' => str_random(10),
        'actif' => 1,
    ];
});
