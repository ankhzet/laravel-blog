<?php

namespace Blog\Http\Requests\Authorizable;

trait AuthorizableTrait {

	public function authorize() {
		$methods = array_filter(get_class_methods(get_class($this)), function ($method) {
			return preg_match('/authorize[A-Z\d]/', $method);
		});

		$invoker = $this->invoker();
		return !array_filter($methods, function ($method) use ($invoker) {
			return !$this->{$method}($invoker);
		});
	}

	/**
	 * Returns current user.
	 *
	 * @return Blog\User
	 */
	public function invoker() {
		return \Auth::user();
	}

}
