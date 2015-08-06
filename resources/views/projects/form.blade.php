<?php $due_date = $status = ""; ?>
@if(isset($project->id))
	<?php $button   = "Update"; ?>
	<?php $status   = $project->getOriginal()['status']; ?>
	<?php $due_date = ($task->due_date == "No Due Date") ? "" : $task->due_date; ?>

	{!! Form::model($project, ['method' => 'PATCH', 'route' => ['projects.update', $project['id']]]) !!}
@else
	<?php $button = "Create"; ?>
	{!! Form::open(['url' => route('projects.store'), 'method' => 'POST']) !!}
@endif
	<div class="form-group">
		{!! Form::label('name', 'Project Name') !!} <em>*</em>
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
		{!! Form::label('status', 'Status') !!}
		{!! Form::select('status', statusOptions(), $status, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit($button, ['class' => 'btn btn-blue']) !!}
		<button type="button" class="btn btn-grey" data-dismiss="modal">Cancel</button>
	</div>
{!! Form::close() !!}