<?php

namespace App\Http\Controllers;

use Request;
use App\Task;
use Carbon\Carbon;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Controller;

class TasksController extends Controller
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
        $projectId = Request::get('project_id');

        $date = Request::get('date');

        if (!$projectId && !$date) {
            return redirect(route('projects.index'));
        }

        if ($projectId) {
            $tasks = Task::where('project_id', $projectId)->where('creator_id', \Auth::user()->id)->with('user', 'project')->orderBy('id', 'DESC')->get();
        } else {
            $tasks = Task::with('user')->whereBetween('due_date', [
                Carbon::createFromFormat('d-m-Y', $date)->subDay(),
                Carbon::createFromFormat('d-m-Y', $date)->addDay()
            ])->where('creator_id', \Auth::user()->id)->get();
        }

        if (Request::wantsJson()) {
            return $tasks;
        } else {
            return view('tasks.all', compact('tasks', 'projectId'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $task = new Task;

        $project = Request::get('project');

        return view('tasks.form', compact('task', 'project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(TaskRequest $request)
    {
        $data = $request->all();

        if ($request->has('due_date')) {
            $data['due_date']   = Carbon::createFromFormat(\Config::get('jarvis.date_format'), $request->get('due_date'));
        }

        $data['creator_id'] = \Auth::user()->id;
      
        $task = Task::create($data);

        if (Request::wantsJson()) {
            return $task;
        } else {
            return redirect(route('tasks.index',['project_id' => $task->project_id]));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Task $task)
    {
        if (Request::wantsJson()) {
            return $task;
        } else {
            return view('tasks.show', compact('task'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Task $task)
    {
        $project = Request::get('project');

        return view('tasks.form', compact('task', 'project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(TaskRequest $request, Task $task)
    {
        $data = $request->all();

        if ($request->has('due_date')) {
            $data['due_date']   = Carbon::createFromFormat(\Config::get('jarvis.date_format'), $request->get('due_date'));
        }

        $data['creator_id'] = \Auth::user()->id;

        $task->update($data);

        if (Request::wantsJson()) {
            return $project;
        } else {
            return redirect(route('tasks.index',['project_id' => $task->project_id]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Task $task)
    {
        $deleted = $task->delete();

        if (Request::wantsJson()) {
            return (string) $deleted;
        } else {
            return redirect(route('tasks.index',['project_id' => $task->project_id]));
        }
    }

    public function getInbox() {

        $tasks = Task::where('status', 0)
            ->where('due_date', '<=', date('Y-m-d'))
            ->where('creator_id', \Auth::user()->id)->get();

        if (Request::wantsJson()) {
            return $tasks;
        } else {
            return view('inbox', compact('tasks'));
        }
    }
}
