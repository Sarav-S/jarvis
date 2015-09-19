<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Login to Jarvis</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{!! asset('public/css/login.css') !!}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script>
	jQuery(document).ready(function(e){
		$('#lg_username').focus();
		$('.form-toggler').click(function(e) {
			e.preventDefault();
			$($(this).attr('data-hide')).removeClass('active');
			$($(this).attr('href')).addClass('active');
		});
	});
	</script>
</head>
<body>
	
	<div class="wrapper">
		<!-- Where all the magic happens -->
		<!-- LOGIN FORM -->
		<h1 class="brand-name text-center">Jarvis</h1>

		<div class="text-center errors">
			@if(Session::has('status'))
				<p class="text-success">{!! Session::get('status') !!}</p>
			@endif

			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif			
		</div>	
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="text-center active" id="login">
						<div class="logo">login</div>
						<!-- Main Form -->
						<div class="login-form-1">
							<form id="login-form" action="{!! route('login.post') !!}" class="text-left" method="POST">
								{!! csrf_field() !!}
								<div class="login-form-main-message"></div>
								<div class="main-login-form">
									<div class="login-group">
										<div class="form-group">
											<label for="lg_username" class="sr-only">Username</label>
											<input type="text" class="form-control" id="lg_username" name="email" placeholder="Username" value="{!! old('email') !!}" autocomplete="off">
										</div>
										<div class="form-group">
											<label for="lg_password" class="sr-only">Password</label>
											<input type="password" class="form-control" id="lg_password" name="password" placeholder="Password">
										</div>
										<div class="form-group login-group-checkbox">
											<input type="checkbox" id="lg_remember" name="remember">
											<label for="lg_remember">Remember me</label>
										</div>
									</div>
									<button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
								</div>
								<div class="etc-login-form">
									<p>Forgot your password? <a href="{!! route('forgot-password.get') !!}" data-hide="#login">Click here</a></p>
								</div>
							</form>
						</div>
						<!-- end:Main Form -->
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>