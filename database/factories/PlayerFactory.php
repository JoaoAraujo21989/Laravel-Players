<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Player;
use Faker\Generator as Faker;

$factory->define(Player::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'country_id' => $faker->numberBetween(1, 242),
        'description' => $faker->paragraph(50),
        'retired' => $faker->boolean,
        'created_at' => now(),
        'updated_at' => now()
    ];
});
