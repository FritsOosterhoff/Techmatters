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
    static $password;

    return [
        'username' => $faker->unique()->username,
        'name' => $faker->name,
        'avatar' =>  $faker->biasedNumberBetween($min = 1, $max = 10, $function = 'sqrt') . '.jpg',
        'banner' =>  $faker->biasedNumberBetween($min = 1, $max = 6, $function = 'sqrt') . '.jpeg',
        'biography' => $faker->text,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
