<?php

$factory->define(Blog\User::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->name,
		'email' => $faker->unique()->safeEmail,
		'password' => bcrypt('secret'),
		'remember_token' => str_random(10),
	];
});

$factory->define(Blog\Post::class, function (Faker\Generator $faker, array $data) {
	return [
		'user_id' => $data['user_id'] ?? 0,
		'title' => $faker->sentence,
		'content' => $faker->text(1000),
	];
});

