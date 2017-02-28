<!DOCTYPE html>
<html>
<head>
	<title> Laravel 5.1 - @yield('title') </title>

	{!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') !!}
	{!! Html::script('https://code.jquery.com/jquery-1.11.1.js') !!}
	{!! Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js') !!}
	
	@if (Auth::check())
			{!! Html::style('css/styles.css') !!}
	@endif

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>


	@include('includes.nav')

	<div class="container">

		<!-- ======================
			Si esta logeado

			usa 
 		====================== -->		
		@if (Auth::check())
			<div class="col-md-3">
				@yield('sidebar')
			</div>
			<div class="col-md-9">
				@yield('content')
			</div>
		@else

			<div class="col-md-12">
				@yield('content')
			</div>
		@endif
	</div>


</body>
</html>