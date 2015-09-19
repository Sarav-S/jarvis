<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="_token" content="{{ csrf_token() }}" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{!! asset('public/css/bootstrap-datepicker.min.css') !!}">
	<link rel="stylesheet" href="{!! asset('public/css/tablesaw.css') !!}">
	<link rel="stylesheet" href="{!! asset('public/css/style.css') !!}">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="{!! asset('public/js/bootstrap-datepicker.min.js') !!}"></script>
	<script src="{!! asset('public/js/bootbox.min.js') !!}"></script>
	<script src="{!! asset('public/js/tablesaw.js') !!}"></script>
	<script src="{!! asset('public/js/script.js') !!}"></script>
	<script>
		var baseurl = "<?php echo url('/') ?>/";
	</script>
</head>
<body>
	<?php $projects = getProjects(); ?>
	@include('navigation')
	<div class="main-content">
		<div class="container-fluid" id="content">
			<div id="sidebar">
				<ul class="links">
					<li>
						<a href="{!! route('home') !!}">
							<i class="fa fa-calendar"></i>
							<span class="label">My Calendar</span>
						</a>
					</li>
					<li>
						<a href="{!! route('inbox') !!}">
							<i class="fa fa-inbox"></i>
							<span class="label">Inbox</span>
						</a>
					</li>
					<li>
						<a href="{!! route('get-account') !!}">
							<i class="fa fa-dashboard"></i>
							<span class="label">My Account</span>
						</a>
					</li>
				</ul>
				<h4 class="title">
					<a href="{!! url('/projects') !!}" class="project-all">PROJECTS</a>
					<a href="{!! route('projects.create') !!}" class="add-project open-modal" data-title="Add New Project">
						<i class="fa fa-plus"></i>
					</a>
				</h4>
				<ul class="projects">
					<?php $projects = getProjects(); ?>
					@foreach($projects as $project)
					<li>
						<a href="{!! route('tasks.index', ['project_id' => $project->id]) !!}">
							<i class="fa fa-folder"></i>
							{!! $project->name !!}
						</a>
					</li>
					@endforeach
				</ul>
			</div>
			<div class="middle">
				@yield('breadcrumbs')
				@if(Session::has('message'))
					<p class="{!! Session::get('class') !!}">{!! Session::get('message') !!}</p>
				@endif

				@yield('content')
			</div>
		</div>
	</div>
	<div class="modal fade" id="myModal">
  		<div class="modal-dialog">
    		<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        			<h4 class="modal-title"></h4>
      			</div>
      			<div class="modal-body">
        			
      			</div>
    		</div>
  		</div>
	</div>
</body>
</html>