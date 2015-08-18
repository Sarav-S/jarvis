@extends('template')

@section('title', 'Inbox')

@section('breadcrumbs')
	@include('breadcrumbs', ['name' => 'inbox'])
@stop

@section('content')
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

@section('sidebar')
	@include('sidebar')
@stop