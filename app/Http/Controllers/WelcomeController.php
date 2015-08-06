<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class WelcomeController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function getHome() {
        return view('welcome');
    }
}