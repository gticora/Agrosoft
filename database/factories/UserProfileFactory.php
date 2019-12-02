<?php

use Faker\Generator as Faker;

$factory->define(Agrososft\UserProfile::class, function (Faker $faker) {
    return [
        'user_id' => factory(\Agrososft\User::class),
        'bio' => $faker->paragraph,
    ];
});
