<?php

namespace Blog;

use Illuminate\Database\Eloquent\SoftDeletes;

class OwnedEntity extends Entity {

	use SoftDeletes;

	public function user() {
		return $this->belongsTo(User::class, 'user_id');
	}

	public function mutableBy(User $user = null) {
		return $user && (($user->id == $this->user_id) || $user->isModerator());
	}

}
