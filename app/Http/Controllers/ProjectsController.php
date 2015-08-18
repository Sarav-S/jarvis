<?php

namespace App\Http\Controllers;

use Request;
use App\Project;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;

class ProjectsController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $date = (Request::has('date')) ? Request::get('date') : "";

        if ($date) {
            $projects = Project::with('user')->whereBetween('due_date', [
                Carbon::createFromFormat('d-m-Y', $date)->subDay(),
                Carbon::createFromFormat('d-m-Y', $date)->addDay()
            ])->where('creator_id', \Auth::user()->id)->get();
        } else {
            $projects = Project::with('user')->where('creator_id', \Auth::user()->id)->latest()->get();
        }

        if (Request::wantsJson()) {
            return $projects;
        } else {
            return view('projects.all', compact('projects'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $project = new Project;

        return view('projects.form', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ProjectRequest $request)
    {
        $data = $request->all();

        if ($request->has('due_date')) {
            $data['due_date']   = Carbon::createFromFormat(\Config::get('jarvis.date_format'), $request->get('due_date'));
        }

        $data['creator_id'] = \Auth::user()->id;
      
        $project = Project::create($data);

        if (Request::wantsJson()) {
            return $project;
        } else {
            return redirect('projects');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id App\Project
     * @return Response
     */
    public function show(Project $project)
    {
        if (Request::wantsJson()) {
            return $project;
        } else {
            return view('projects.show', compact('project'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Project $project)
    {
         return view('projects.form', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id App\Project
     * @return Response
     */
    public function update(ProjectRequest $request, Project $project)
    {   
        $data = $request->all();

        if ($request->has('due_date')) {
            $data['due_date']   = Carbon::createFromFormat(\Config::get('jarvis.date_format'), $request->get('due_date'));
        }

        $data['creator_id'] = \Auth::user()->id;

        $project->update($data);

        if (Request::wantsJson()) {
            return $project;
        } else {
            return redirect('projects');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id App\Project
     * @return Response
     */
    public function destroy(Project $project)
    {
        $deleted = $project->delete();

        if (Request::wantsJson()) {
            return (string) $deleted;
        } else {
            return redirect('projects');
        }
    }
}
