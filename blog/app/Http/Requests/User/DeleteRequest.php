<?php

namespace Blog\Http\Requests\User;

use Blog\Http\Requests\ModeratorRequest;
use Blog\User;

class DeleteRequest extends ModeratorRequest {

	public function candidate() {
		return User::withTrashed()->findOrFail($this->route('user'));
	}

}
