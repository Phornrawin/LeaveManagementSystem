<?php

use Faker\Generator as Faker;

$factory->define(App\Leave::class, function (Faker $faker) {
    $category_ids = App\Category::all()->pluck('id')->toArray();
    $user_ids = App\User::all()->pluck('id')->toArray();
    $task_ids = App\Task::all()->pluck('id')->toArray();
    $me = $faker->randomElement($user_ids);
    unset($user_ids[array_search($me, $user_ids)]);
    $date1 = $faker->date;
    $date2 = $faker->date;
    if ($date1 < $date2) {
        $start_date = $date1;
        $end_date = $date2;
    } else {
        $start_date = $date2;
        $end_date = $date1;
    }
    return [
        'user_id' => $me,
        'substitute_id' => $faker->randomElement($user_ids),
        'category_id' => $faker->randomElement($category_ids),
        'task_id' => $faker->randomElement($task_ids),
        'start_date' => $start_date,
        'end_date' => $end_date,
        'status' => $faker->randomElement([
            'new', 'rejected by substitute', 'wait for approval', 'approved', 'rejected', 'cancel'
        ])
    ];
});
