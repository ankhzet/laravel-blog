<?php

namespace Blog;

class Post extends OwnedEntity {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'title', 'content'
	];

	public function mutableBy(User $user = null) {
		if (!$user)
			return false;

		$byModerator = $user->isModerator();
		// moderator permitted (especially, if creation requested)
		if ($byModerator || !$this->exists)
			return $byModerator;

		// updates permitted to owner
		return $user->id == $this->user_id;
	}

	public function comments() {
		return $this->hasMany(Comment::class, 'post_id');
	}

	public function tags() {
		return $this->belongsToMany(Tag::class, 'posts_tags');
	}

}
