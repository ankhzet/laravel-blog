<?php

namespace Blog;

class Tag extends Entity {

	public function posts() {
		return $this->belongsToMany(Post::class, 'posts_tags');
	}

}
