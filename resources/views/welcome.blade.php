@extends('template')

@section('title', 'Dashboard')

@section('content')
	<div class="header">
		<div class="row">
			<div class="col-sm-4">
				<a href="" class="btn-blue">
					Add Event
				</a>
			</div>
			<div class="col-sm-4">
				<h2 class="month">
					{!! date('F Y') !!}
				</h2>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
	<div class="table-responsive">
		{!! draw_calendar(date('m'), date('Y')) !!}
	</div>
@stop