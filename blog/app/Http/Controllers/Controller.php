<?php

namespace Blog\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	 * Utils
	 */

	protected function name() {
		return strtolower(str_replace('Controller', '', array_last(explode('\\', get_class($this)))));
	}

	public function innerRedirect($action, $params = []) {
		return redirect()->route("{$this->name()}.{$action}", $params);
	}

	public function backRedirect($errors = null) {
		$redirect = redirect()->back();
		if ($errors)
			$redirect = $redirect->withErrors($errors);
		return $redirect;
	}

	public function innerView($view, $data = []) {
		return view("{$this->name()}.{$view}", $data);
	}

}
