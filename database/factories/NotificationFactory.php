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

$factory->define(App\Notification::class, function (Faker $faker) {

    return [
      'user_id' => $faker->biasedNumberBetween($min = 1, $max = 200, $function = 'sqrt'),
      'notifiable_id' => 201,
      'notifiable_type' => 'App\User',
    ];
});
