<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Report::class, function (Faker $faker) {
    return [
        'guid' => $faker->uuid,
        'title' => $faker->sentence,
        'description' => $faker->text,
        'address' => $faker->address,
        'city' => $faker->city,
        'type' => $faker->randomElement(['Stormschade', 'Gebouwbrand', 'Gasontsnapping', 'Persoon te water', 'Brandmelding']),
        'is_visible' => 1,
        'report_at' => $faker->dateTimeThisYear,
    ];
});

$factory->define(App\Tip::class, function (Faker $faker) {
    return [
        'description' => $faker->text,
    ];
});
