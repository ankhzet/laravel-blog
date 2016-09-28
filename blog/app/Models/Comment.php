<?php

namespace Blog;

class Comment extends OwnedEntity {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'content',
	];

	public function post() {
		return $this->belongsTo(Post::class, 'post_id');
	}

}
