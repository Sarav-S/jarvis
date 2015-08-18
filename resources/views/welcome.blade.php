@extends('template')

@section('title', 'Dashboard')

@section('breadcrumbs')
	@include('breadcrumbs', ['name' => 'home'])
@stop

@section('content')
	@include('calendar')
@stop

@section('sidebar')
	@include('sidebar')
@stop