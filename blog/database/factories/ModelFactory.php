<?php

$factory->define(Blog\User::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->name,
		'is_admin' => false,
		'is_moderator' => $faker->boolean(25),
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

$factory->define(Blog\Comment::class, function (Faker\Generator $faker, array $data) {
	return [
		'post_id' => $data['post_id'] ?? 0,
		'user_id' => $data['user_id'] ?? 0,
		'content' => $faker->text(500),
	];
});
