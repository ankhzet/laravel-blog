<?php

namespace Blog\Http\Requests\Comment;

use Blog\Post;
use Blog\Comment;

class UpdateRequest extends \Blog\Http\Requests\OwnedEntityUpdateRequest {

	protected $routeParameter = 'comment';

	public function rules() {
		return [
			'content' => 'required|max:500',
		];
	}

	public function candidate() {
		$entity = parent::candidate();
		if (!$entity->exists) {
			$entity->post_id = $this->post()->id;
		}
		return $entity;
	}

	public function post() {
		return Post::findOrFail($this->route('post'));
	}

	public function entityClass() {
		return Comment::class;
	}

}
