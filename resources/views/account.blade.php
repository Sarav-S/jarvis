@extends('template')

@section('title', 'Inbox')

@section('breadcrumbs')
	@include('breadcrumbs', ['name' => 'search'])
@stop

@section('content')
	<h3>My Account</h3>
	<hr>
	<div class="row">
		<div class="col-sm-6">
			{!! Form::open(['route' => 'post-account', 'method' => 'POST', 'id' => 'post-account']) !!}
				<div class="form-group">
					{!! Form::label('name', 'Name') !!} <em>*</em>
					{!! Form::text('name', \Auth::user()->name, ['class' => 'form-control', 'required' => 'required']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('email', 'Email') !!} <em>*</em>
					{!! Form::text('email', \Auth::user()->email, ['class' => 'form-control', 'required' => 'required', 'readonly' => 'readonly' ]) !!}
				</div>
			
				<div class="form-group">
					{!! Form::label('password', 'Password') !!} <em>*</em>
					{!! Form::input('password', 'password', old('password'), ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit("Update", ['class' => 'btn btn-blue']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@stop

@section('sidebar')
	@include('calendar')
@stop