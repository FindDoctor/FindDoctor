<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-br"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Projeto PDS - @yield('titulo')</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="css/app.css">
		@yield('css')
	</head>

	<body>
		<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	        <div class="container">
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	                    <span class="sr-only">Toggle navigation</span>
				    	<span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="#">Project name</a>
	            </div>
	            <div id="navbar" class="navbar-collapse collapse">
	                <form class="navbar-form navbar-right" role="form">
	                    <div class="form-group">
	                        <input type="text" placeholder="Email" class="form-control">
	                    </div>
	                    <div class="form-group">
	                        <input type="password" placeholder="Password" class="form-control">
	                    </div>
	                    <button type="submit" class="btn btn-success">Sign in</button>
	                </form>
	            </div><!--/.navbar-collapse -->
	        </div>
	    </nav>

		<div class="jumbotron">
	        <div class="container">
			    @yield('conteudo')
	        </div>
	    </div>

		<footer>
            <p>&copy; Company 2016</p>
        </footer>

		<script src="js/app.js"></script>
		@yield('js')
	</body>
</html>
