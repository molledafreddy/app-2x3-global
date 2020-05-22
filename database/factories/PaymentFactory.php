<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'uuid' => (string) Str::uuid(),
        'payment_date' => now(),
        'expires_at' => now(),
        'clp_usd' => $faker->randomNumber(4), 
        'status' => $faker->randomElement($array = array('pending', 'paid')),
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
    ];
});