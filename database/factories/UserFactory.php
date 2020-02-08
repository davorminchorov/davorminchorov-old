<?php

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => 'Davor Minchorov',
        'email' => 'davorminchorov@gmail.com',
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
