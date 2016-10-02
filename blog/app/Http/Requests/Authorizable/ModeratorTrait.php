<?php

namespace Blog\Http\Requests\Authorizable;

trait ModeratorTrait {

	/**
	 * Returns true, if logined and is moderator.
	 *
	 * @return boolean
	 */
	public function authorizeIsModerator($user) {
		return !!($user && $user->isModerator());
	}

}
