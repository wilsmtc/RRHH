<?php

use Faker\Generator as Faker;
use App\User;
use App\Permission;

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

$factory->define(User::class, function (Faker $faker) {
    $array = [

    	'role_id'=>1,
        'username' => $faker->unique()->userName,
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->freeEmail,
        'password' => bcrypt('123456') // secret
        //'remember_token' => str_random(10),
    ];
    return $array;
});

