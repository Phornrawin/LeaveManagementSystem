<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    $user_ids = App\User::all()->pluck('id')->toArray();
    return [
        'name' => $faker->word,
        'assign_to' => $faker->randomElement($user_ids)
    ];
});
