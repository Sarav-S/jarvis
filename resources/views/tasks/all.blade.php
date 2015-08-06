@extends('template')

@section('title', 'Tasks')

@section('breadcrumbs')
	@include('breadcrumbs', ['name' => 'tasks.index'])
@stop

@section('content')
	<div class="header">
		<div class="row">
			<div class="col-sm-4">
				<a href="{!! route('tasks.create') !!}" class="btn-blue open-modal" data-title="Add New Task" data-project="{!! $projectId !!}">
					Add Task
				</a>
			</div>
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
	
	<table class="table table-bordered table-sorter" data-tablesaw-sortable data-tablesaw-sortable-switch>
		<thead>
			<tr>
				<th data-tablesaw-sortable-col data-tablesaw-sortable-default-col>Task Name</th>
				<th>Creator</th>
				<th data-tablesaw-sortable-col>Due Date</th>
				<th data-tablesaw-sortable-col>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tasks as $task)
			<tr class="load-content" data-href="{!! route('tasks.show', $task->id) !!}">
				<td>{!! $task->name !!}</td>
				<td>{!! $task->user->name or "NA" !!}</td>
				<td>{!! $task->due_date !!}</td>
				<td>{!! $task->status !!}</td>
				<td>
					<a href="{!! route('tasks.edit', $task->id) !!}" class="label label-success open-modal" data-title="Edit Project" data-project="{!! $task->project_id !!}"><i class="fa fa-edit"></i> Edit</a>
					{!! Form::open(['method' => 'DELETE', 'route' => ['tasks.destroy', $task->id], 'class' => 'form-delete']) !!}
					    <button class="label label-danger delete">
					    	<span>
					    		<i class="fa fa-trash"></i> Delete
					    	</span>
					    </button>
					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@stop