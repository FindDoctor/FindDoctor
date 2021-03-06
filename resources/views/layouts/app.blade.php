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
@section('css')
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
@show

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
		  <a class="navbar-brand" href="{{ url('/') }}">
			<img alt="Brand" height="54px" src="{{ url('/imgs/logo-fd.png') }}">
		  </a>
		</div>
	  </div>
			<div class="top-right links">
				@if (Auth::guard('paciente')->user() || Auth::guard("medico")->user())
					@if (Auth::guard("medico")->user())
						Bem vindo, {{ Auth::guard("medico")->user()->nome }}
						<a href="{{ url('/dados') }}">Dados</a>
						<a href="{{ url('/medico/logout') }}">Sair</a>
					@else
						Bem vindo, {{ Auth::guard("paciente")->user()->nome }}
						<a href="{{ url('/dados') }}">Dados</a>
						<a href="{{ url('/paciente/logout') }}">Sair</a>
					@endif
				@else
					<a href="{{ url('/login') }}">Entrar</a>
					<a href="{{ url('/register') }}">Cadastrar</a>
				@endif
			</div>
	</nav>

    @yield('content')

	<div id="footer" class="footer">

		<section class="container">
			<div class="col-md-4">
				<img id="logo-bottom" alt="Brand" height="54px" src="{{ url('/imgs/logo-fd.png') }}">
			</div>

			<div class="col-md-4">
				<h4>Saiba Mais</h4>
				<ul>
					<li>
						 <a href="{{ url('/quemsomos') }}">Quem somos nós?</a>
					</li>
					<li>
						<a href="{{ url('/contato') }}">Contato</a>
					</li>

				</ul>
			</div>

			<div class="col-md-2 midias-socias">
				<h4>Mídias Sociais</h4>
				<ul class="md-list">
					<li><img alt="Brand" class="icon-midia-social" alt="facebook" src="{{ url('/imgs/facebook-icon.png') }}"></li>
					<li><img alt="Brand" class="icon-midia-social" alt="twitter" src="{{ url('/imgs/twitter-icon.png') }}"></li>
					<li><img alt="Brand" class="icon-midia-social" alt="google plus" src="{{ url('/imgs/g-icon.png') }}"></li>
				</ul>


			</div>

			<div class="col-md-2">
				<div class="vcard">
					<p class="fn">FindDoctor<p>
					<p class="adr">
					<span class="street-address">Rodovia João Leme dos Santos, Km 110</span><br>
					<span class="region">Itinga - Sorocaba</span><br>
					<span class="postal-code">18052-780</span><br>
					<span class="country-name">Brasil</span>
					</p>
					<p class="tel">+55 (16) 3351-6000</p>
				</div>
			</div>

		</section>

		<div class="copyright">
			<div class="container">
				© FindDoctor 2016
			</div>
		</div>

	</div>

	<div id="black-filter" class="black-filter"></div>

    <!-- Scripts -->
@section('js')
	<script type="text/javascript">
		var baseUrl = "{{ URL::to('/') }}";
	</script>
    <script src="{{ URL::asset('js/app.js') }}"></script>

@show
</body>
</html>
