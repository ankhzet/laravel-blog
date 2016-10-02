<?php

namespace Blog\Http\Requests\User;

use Blog\Http\Requests\ModeratorRequest;

class GrantRoleRequest extends ModeratorRequest {

	public function rules() {
		return [
			'users' => 'required',
		];
	}

	public function roles() {
		$users = $this->get('users');
		$grant = $this->get('grant');
		$roles = [];
		$user  = $this->invoker()->id;
		foreach ($users as $id) {
			if ($user == $id)
				continue; // can't change self moderator role

			$roles[$id] = intval($grant[$id] ?? 0);
		}

		return $roles;
	}

}
