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

	public function comments() {
		return $this->hasMany(Comment::class, 'post_id');
	}

}
