<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		$user = Blog\User::first();

		factory(Blog\Post::class, 25)->create(['user_id' => $user->id]);

	}

}
