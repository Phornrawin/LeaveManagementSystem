<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    $department_ids = App\Department::all()->pluck('id')->toArray();
    $user_ids = App\User::all()->pluck('id')->toArray();
    return [
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'), // secret
        'firstname' => $faker->firstname,
        'lastname' => $faker->lastname,
        'gender' => $faker->randomElement([
            'male', 'female'
        ]),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'supervisor_id' => $faker->randomElement($user_ids),
        'department_id' => $faker->randomElement($department_ids),
        'position' => $faker->word,
        'tel' => $faker->phoneNumber,
        'facebook' => $faker->username,
        'line' => $faker->username,
        'remember_token' => str_random(10),
    ];
});
