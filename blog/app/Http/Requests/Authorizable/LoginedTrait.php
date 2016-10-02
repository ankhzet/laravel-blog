<?php

namespace Blog\Http\Requests\Authorizable;

trait LoginedTrait {

	/**
	 * Returns true, if logined.
	 *
	 * @return boolean
	 */
	public function authorizeLogined($user) {
		return !!$user;
	}

}
