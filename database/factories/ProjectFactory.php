<?php

use Faker\Generator as Faker;

$factory->define(Lighthouse\Project::class, function (Faker $faker) {
    $name = $faker->company;

    return [
        'name'        => $name,
        'slug'        => str_slug($name),
        'description' => $faker->paragraph,
        'owner_id'    => rand(1, Lighthouse\User::count()),
    ];
});
