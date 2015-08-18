<?php namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function getHome() {
        return view('welcome');
    }

    public function getSearch() {

    	$query = Request::get('search');

    	$projects = \App\Project::where('name', 'LIKE', '%'.$query.'%')->where('creator_id', \Auth::user()->id)->get();

    	$tasks = \App\Task::where('name', 'LIKE', '%'.$query.'%')->where('creator_id', \Auth::user()->id)->get();

    	return view('search', compact('projects', 'tasks'));
    }
}