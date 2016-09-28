<?php

namespace Blog\Http\Requests\Post;

use Blog\Post;

class UpdateRequest extends \Blog\Http\Requests\OwnedEntityUpdateRequest {

	protected $routeParameter = 'post';

	public function rules() {
		return [
			'title' => 'required|max:200',
			'content' => 'required',
		];
	}

	public function entityClass() {
		return Post::class;
	}

}
