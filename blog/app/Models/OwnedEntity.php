<?php

namespace Blog;

class OwnedEntity extends Entity {

	public function user() {
		return $this->belongsTo(User::class, 'user_id');
	}

	public function mutableBy(User $user = null) {
		return $user && (($user->id == $this->user_id) || $user->isModerator());
	}

}
