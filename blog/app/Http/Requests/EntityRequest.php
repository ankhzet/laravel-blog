<?php

namespace Blog\Http\Requests;

use Blog\Entity;

class EntityRequest extends LoginedUserRequest {

	protected $routeParameter = 'id';

	public function rules() {
		return [];
	}

	public function data() {
		$data = $this->all();
		return array_except($data, array_filter(array_keys($data), function ($key) {
			return starts_with($key, '_') || (strtolower($key) == 'deleted');
		}));
	}

	public function entityClass() {
		return Entity::class;
	}

	/**
	 * Returns candidate entity instance that should be mutated by this request.
	 *
	 * @return \Blog\Entity
	 */
	public function candidate() {
		$class = $this->entityClass();

		$id = $this->route($this->routeParameter);
		if ($id)
			return $class::findOrFail($id);

		return new $class($this->data());
	}

}
