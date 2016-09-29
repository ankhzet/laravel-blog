<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$admin = [
			'name' => 'Admin',
			'email' => 'admin@example.com',
			'is_admin' => true,
			'is_moderator' => true,
			'password' => bcrypt('secret'),
		];

		factory(Blog\User::class, 1)->create()->each(function($u) use ($admin) {
			$u->forceFill($admin)
				->save();
		});

		factory(Blog\User::class, 5)->create()->each(function($u) {
		});
	}

}
