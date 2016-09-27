<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;

use Blog\Http\Requests;

class HomeController extends Controller {

	public function index() {
		return view('index');
	}

}
