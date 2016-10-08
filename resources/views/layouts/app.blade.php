<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ url('/css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="#">
			<img alt="Brand" height="54px" src="{{ url('/imgs/logo-fd.png') }}">
		  </a>
		</div>
	  </div>
		@if (Route::has('login'))
			<div class="top-right links">
				<a href="{{ url('/login') }}">Login</a>
				<a href="{{ url('/register') }}">Register</a>
			</div>
		@endif
	</nav>

    @yield('content')

	<div id="footer" class="footer">

		BYE

	</div>

    <!-- Scripts -->
@section('js')
    <script src="{{ url('/js/app.js') }}"></script>
@show
</body>
</html>
