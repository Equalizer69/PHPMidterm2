<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Classes::class, function (Faker $faker) {
    return [
        'classname' => $faker->name
    ];
});
