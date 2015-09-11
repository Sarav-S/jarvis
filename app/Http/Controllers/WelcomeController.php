<?php namespace App\Http\Controllers;

use Request;
use Validator;
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

    public function getAccount() {
        return view('account');
    }

    public function postAccount() {

        $inputs = Request::all();

        $rules = [
            'name'     => 'required|min:3',
            'email'    => 'required|email'
        ];

        if (Request::has('password')) {
            $rules['password'] = 'required|min:8';
        } else {
            unset($inputs['password']);
        }

        $validator = Validator::make($inputs, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with([
                    'message' => 'Please fill in required fields',
                    'class'   => 'text-danger'
                ]);
        }

        unset($inputs['email']);

        if (Request::has('password')) {
            $inputs['password'] = bcrypt($inputs['password']);
        }

        $user = \App\User::find(\Auth::user()->id);

        foreach (array_except($inputs, ['_token']) as $key => $value) {
            $user->$key = $value;
        }

        if ($user->save()) {
            return back()->withErrors($validator)->withInput()->with([
                    'message' => 'Settings have been saved successfully',
                    'class'   => 'text-success'
                ]);
        } else {
            return back()->withErrors($validator)->withInput()->with([
                    'message' => 'Unable to save. Please try again',
                    'class'   => 'text-danger'
                ]);
        }
    }

    public function getCalendar() {
        $calendar = explode('-', Request::get('month'));

        $dateObj   = \DateTime::createFromFormat('!m', $calendar[0]);
        $monthName = $dateObj->format('F'); // March

        $result = ['month' => $monthName.' '.$calendar[1], 'html' => draw_calendar($calendar[0], $calendar[1], true)];
        return \Response::json($result);
    }
}