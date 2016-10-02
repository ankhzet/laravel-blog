<?php

namespace Blog\Http\Requests\Post;

use Blog\Post;
use Blog\Tag;

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

	public function data() {
		return array_except(parent::data(), ['tags']);
	}

	public function tags() {
		$names = array_filter(array_map(function ($tag) {
			return trim($tag);
		}, explode(',', $this->get('tags'))));

		return array_map(function ($tag) {
			return intval($tag->id);
		}, Tag::whereIn('name', $names)->get(['id'])->all());
	}

}
