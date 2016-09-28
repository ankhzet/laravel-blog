<?php

$factory->define(Blog\User::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->name,
		'email' => $faker->unique()->safeEmail,
		'password' => bcrypt('secret'),
		'remember_token' => str_random(10),
	];
});
