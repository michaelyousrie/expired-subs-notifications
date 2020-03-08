<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name'          => $faker->name,
        'email'         => $faker->email,
        'join_date'     => now(),
        'sub_end_date'  => now()->addYear(),
        'bundle_name'   => $faker->word
    ];
});
