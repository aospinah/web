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
	$fakerName = $faker->name;
    return [
        'user_name' => $fakerName,
        'user_email' => $faker->unique()->safeEmail,
        'user_email_verified_at' => now(),
        'user_ocupation' => $faker->sentence,
        'user_slug' => str_slug($fakerName),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'user_institution' => $faker->sentence,
        'user_city' => $faker->sentence,
        'remember_token' => str_random(10),
    ];
});