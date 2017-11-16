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

$factory->define(App\Post::class, function (Faker $faker) {


    return [
        'title' => $faker->title,
        'text' => $faker->text,
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'user_id' => $faker->biasedNumberBetween($min = 1, $max = 200, $function = 'sqrt')
    ];
});
