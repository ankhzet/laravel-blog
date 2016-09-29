<?php

namespace Blog\Http\Requests;

class OwnedEntityUpdateRequest extends EntityRequest {

	public function authorize() {
		$invoker = parent::authorize();
		if (!$invoker)
			return false;

		$instance = $this->candidate();

		return $instance->mutableBy($invoker);
	}

	/**
	 * Returns candidate entity instance that should be mutated by this request.
	 *
	 * @return \Blog\OwnedEntity
	 */
	public function candidate() {
		$entity = parent::candidate();
		if (!$entity->exists) {
			$entity->user_id = $this->invoker()->id;
		}
		return $entity;
	}

}
