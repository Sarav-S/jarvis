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
	<link rel="stylesheet" href="{!! asset('css/bootstrap-datepicker.min.css') !!}">
	<link rel="stylesheet" href="{!! asset('css/tablesaw.css') !!}">
	<link rel="stylesheet" href="{!! asset('css/style.css') !!}">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="{!! asset('js/bootstrap-datepicker.min.js') !!}"></script>
	<script src="{!! asset('js/bootbox.min.js') !!}"></script>
	<script src="{!! asset('js/tablesaw.js') !!}"></script>
	<script src="{!! asset('js/script.js') !!}"></script>
</head>
<body>
	@include('navigation')
	<div class="main-content">
		@yield('breadcrumbs')
		<div class="container-fluid" id="content">
			<div class="row">
				<div class="col-sm-8 middle">
					@yield('content')
				</div>
				<div class="col-sm-4 right-sidebar">
					@include('sidebar')
				</div>
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