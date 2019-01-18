<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'details' => $faker->words(3,true),
        'tag_id' => function () {
            return factory(App\Tag::class)->create()->id;
        }
    ];
});
