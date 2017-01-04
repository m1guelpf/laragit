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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'id'             => $faker->unique()->randomNumber($nbDigits = 3),
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'token'          => str_random(15),
        'remember_token' => str_random(10),
    ];
});
