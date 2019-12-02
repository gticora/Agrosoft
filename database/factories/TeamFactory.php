<?php

use Faker\Generator as Faker;

$factory->define(Agrososft\Team::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
    ];
});
