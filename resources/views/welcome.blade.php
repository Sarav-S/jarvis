@extends('template')

@section('title', 'Dashboard')

@section('breadcrumbs')
	@include('breadcrumbs', ['name' => 'home'])
@stop

@section('content')
	<div class="header">
		<h2 class="month">
			{!! date('F Y') !!}
		</h2>
	</div>
	<div class="table-responsive">
		{!! draw_calendar(date('m'), date('Y'), true) !!}
	</div>
@stop