<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Service; 
use Faker\Generator as Faker; 

$factory->define(Service::class, function (Faker $faker) {
    return [
        'category_id' => 1,
        'name' => $faker->name, 
        'active' => 1,
        'created_at' => now(),
        'updated_at' => null,
    ];
});
