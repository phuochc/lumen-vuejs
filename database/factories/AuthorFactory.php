<?php

$factory->define(App\Models\Author::class, function (Faker\Generator $faker) {
    return [
        'gender' => $gender = $faker->randomElement(['male', 'female']),
        'name' => $faker->name($gender),
        'country' => $faker->country,
    ];
});
