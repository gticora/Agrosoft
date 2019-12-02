<?php

use Faker\Generator as Faker;

$factory->define(Agrososft\Cargo::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(2),
    ];
});
