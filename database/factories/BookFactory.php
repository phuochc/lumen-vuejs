<?php
$factory->define(App\Models\Book::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(3, true),
        'description' => $faker->sentence(6, true),
        'price' => $faker->numberBetween(25, 150),
        'author_id' => function () {
            return factory(App\Models\Author::class)->create()->id;
        },
    ];
});
