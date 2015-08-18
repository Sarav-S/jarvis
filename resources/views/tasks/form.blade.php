<?php $due_date = $status = ""; ?>
@if(isset($task->id))
	<?php $button  = "Update"; ?>
	<?php $status   = $task->getOriginal()['status']; ?>
	<?php $due_date = ($task->due_date == "No Due Date") ? "" : $task->due_date; ?>
	{!! Form::model($task, ['method' => 'PATCH', 'route' => ['tasks.update', $task['id']]]) !!}
@else
	<?php $button = "Create"; ?>
	{!! Form::open(['url' => route('tasks.store'), 'method' => 'POST']) !!}
@endif

@if (isset($project))
	<input type="hidden" name="project_id" value="{!! $project !!}">
@else
	<div class="form-group">
		{!! Form::label('project_id', 'Project Name') !!}
		{!! Form::select('project_id', getProjectsOptions(), '', ['class' => 'form-control', 'required' => 'required']) !!}
	</div>
@endif

	<div class="form-group">
		{!! Form::label('name', 'Task Name') !!} <em>*</em>
		{!! Form::text('name', old('name'), ['class' => 'form-control', 'required' => 'required']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('description', 'Description (Optional)') !!}
		{!! Form::textarea('description', old('description'), ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('due_date', 'Project Due Date') !!}
		{!! Form::text('due_date', $due_date, ['class' => 'form-control datepicker',"readonly" => "readonly",   "data-date-format" => \Config::get('jarvis.js_date_format')]) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('category_id', 'Category') !!}
		{!! Form::select('category_id', getCategoryOptions(), old('category_id'), ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('status', 'Status') !!}
		{!! Form::select('status', statusOptions(), $status, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit($button, ['class' => 'btn btn-blue']) !!}
		<button type="button" class="btn btn-grey" data-dismiss="modal">Cancel</button>
	</div>
{!! Form::close() !!}