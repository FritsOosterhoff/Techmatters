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

$factory->define(App\Comment::class, function (Faker $faker) {

    return [
      'text' => $faker->text,
      'user_id' => $faker->biasedNumberBetween($min = 1, $max = 200, $function = 'sqrt'),
      'commentable_id' => $faker->biasedNumberBetween($min = 1, $max = 500, $function = 'sqrt'),
      'commentable_type' => 'App\Post',
    ];
});
