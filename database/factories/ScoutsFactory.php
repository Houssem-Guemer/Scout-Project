<?php

use Faker\Generator as Faker;

$factory->define(App\Scout::class, function (Faker $faker) {
    return [
        'scout_id' => $faker->unique()->numberBetween(10000, 99999),
        'assurance_num' => $faker->unique()->numberBetween(1000000000, 2147483647),
        'first_name' => $faker->firstName,
        'last_name'  => $faker->lastName,
        'date_of_birth' => $faker->date('Y-m-d', '-40 years'),
        'membership_date' => $faker->date('Y-m-d', '-15 years'),
        'email' => $faker->unique()->email,
        'phone' => $faker->unique()->phoneNumber
    ];
});
