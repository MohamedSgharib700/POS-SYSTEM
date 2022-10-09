<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pos;
use Faker\Generator as Faker;

$factory->define(Pos::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'machine_code' => $faker->unique()->randomNumber(3), 
        'active' => 1,
        'created_at' => now(),
        'updated_at' => null,
    ];
});
