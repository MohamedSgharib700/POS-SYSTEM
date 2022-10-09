<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Prepaid;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Prepaid::class, function (Faker $faker) {
    return [
        'user_service_number' => $faker->unique()->randomNumber,
        'name' => $faker->name,
        'status' => '1',
        'service_id' =>'1',
        'category_id' => '1',
        'company_id' =>'1',
        'pos_id' => '1',
        'value' =>$faker->randomNumber(3),
        'created_at' => now(),
        'updated_at' => null,
    ];
});
