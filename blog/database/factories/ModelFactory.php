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

$factory->define(Blog\Post::class, function (Faker\Generator $faker) {
	return [
		'title' => $faker->sentence,
		'content' => $faker->text(1000),
	];
});

$factory->define(Blog\Comment::class, function (Faker\Generator $faker) {
	return [
		'content' => $faker->text(500),
	];
});

$factory->define(Blog\Tag::class, function (Faker\Generator $faker) {
	$name = $faker->word;
	while ((strlen($name) <= 2) || Blog\Tag::where('name', $name)->count())
		$name = $faker->word;

	return [
		'name' => $name,
		'annotation' => $faker->text(200),
	];
});
