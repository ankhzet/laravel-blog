<?php

namespace Blog;

class Tag extends Entity {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'annotation'
	];

	public function posts() {
		return $this->belongsToMany(Post::class, 'posts_tags');
	}

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName() {
		return 'name';
	}

}
