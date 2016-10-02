<?php

use Illuminate\Database\Seeder;

use Faker\Factory;

class TagsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		factory(Blog\Tag::class, rand(10, 50))
			->create();

		$posts = Blog\Post::all();
		$tags = Blog\Tag::all();
		foreach ($tags as $tag) {
			$tag->posts()->attach($posts->random(rand(3, 10)));
		}
	}

}
