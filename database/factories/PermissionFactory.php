<?php

use Faker\Generator as Faker;
use App\Permission;
$factory->define(Permission::class, function ($faker) {
    return [
        'add' => 0,
        'edit'=>0,
        'remove' => 0,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});

