<?php

namespace Blog\Http\Requests\Tag;

use Blog\Http\Requests\EntityRequest;
use Blog\Tag;

class UpdateRequest extends EntityRequest {

	protected $routeParameter = 'tag';

	public function rules() {
		return [
			'name' => 'required|max:50',
			'annotation' => 'max:1000',
		];
	}

	public function entityClass() {
		return Tag::class;
	}

}
