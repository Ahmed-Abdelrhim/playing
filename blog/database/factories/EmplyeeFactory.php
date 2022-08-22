<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'salary' => $faker->numberBetween(4000,10000),
        'job' => $faker->randomElement(['Full Stack' , 'Front-End','Back-End','AI','Mobile Developer']),
    ];
});
