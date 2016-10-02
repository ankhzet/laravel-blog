<?php

namespace Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Blog\Http\Requests\Authorizable\AuthorizableTrait;

class AuthorizableRequest extends FormRequest {
	use AuthorizableTrait;

	public function rules() {
		return [];
	}

}
