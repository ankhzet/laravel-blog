<?php

namespace Blog\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider {

	protected $helpers = [
	];

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {
		$dir = app_path() . '/Helpers/';
		foreach ($this->helpers as $helper) {
			$file = "{$dir}{$helper}.php";
			if (file_exists($file)) {
				require_once($file);
			}
		}
	}

}
