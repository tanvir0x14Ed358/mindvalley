<?php

use Faker\Generator as Faker;

$factory->define(App\Photo::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['test1.jpg', 'test2.jpg','test3.jpg']),
        'article_id' => function () {
            return factory(App\Article::class)->create()->id;
        }
    ];
});
