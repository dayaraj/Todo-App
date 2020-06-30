<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Model;

$factory->define(App\Todo::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->sentence(3),
        'description' => $faker->paragraph(4),
        'completed' => false
    ];
});
