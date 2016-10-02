<?php

namespace Blog\Http\Requests;

use Blog\OwnedEntity;

class OwnedEntityUpdateRequest extends EntityRequest {

	public function authorizeModelOwnedByInvoker() {
		$invoker = $this->invoker();
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

	public function entityClass() {
		return OwnedEntity::class;
	}

}
