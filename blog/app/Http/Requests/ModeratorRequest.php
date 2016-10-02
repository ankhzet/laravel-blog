<?php

namespace Blog\Http\Requests;

use Blog\Http\Requests\Authorizable\ModeratorTrait;

class ModeratorRequest extends AuthorizableRequest {
	use ModeratorTrait;

}
