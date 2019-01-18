<?php

use Faker\Generator as Faker;

$factory->define(App\Role::class, function (Faker $faker) {
    $roles = array('admin', 'user');
    return [
        'name' => $faker->unique()->randomElement($roles),
    ];
});
