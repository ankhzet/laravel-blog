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

}
