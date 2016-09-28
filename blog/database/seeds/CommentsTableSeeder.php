<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$users = Blog\User::all();
		foreach (Blog\Post::all() as $post) {

			factory(Blog\Comment::class, rand(0, 10))
				->create(['post_id' => $post->id])
				->each(function($comment) use ($users) {
					$users->random()->comments()->save($comment);
				});
		}
	}

}
