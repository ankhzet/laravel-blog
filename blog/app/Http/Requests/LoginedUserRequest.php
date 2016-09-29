<?php

namespace Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginedUserRequest extends FormRequest {

	public function rules() {
		return [];
	}

	/**
	 * Returns current user, if logined.
	 *
	 * @return Blog\User
	 */
	public function authorize() {
		return $this->invoker();
	}

	/**
	 * Returns current user.
	 *
	 * @return Blog\User
	 */
	public function invoker() {
		return \Auth::check() ? \Auth::user() : null;
	}

}
