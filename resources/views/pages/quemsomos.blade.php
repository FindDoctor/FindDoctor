@extends('layouts.app')


@section('content')
	<div class="quemsomos">
		<div class="titulo">Quem somos</div>
		<div class="container quemsomos1">
				<div class="col-md-6">
					<img class="img-bertz" src="http://localhost:8000/imgs/bertz.jpg">
					<span>Lucas Bertone</span>
					Aluno de ciência da computação na Universidade Federal de São Carlos - Campus Sorocaba.
					Responsável pelo back-end do site.
				</div>
				<div class="col-md-6">
					<img class="img-math" src="http://localhost:8000/imgs/math.jpg">
					<span>Matheus Pinheiro</span>
					Aluno de ciência da computação na Universidade Federal de São Carlos - Campus Sorocaba.
					Responsável pelo back-end do site.
				</div>
			</div>
			<div class="container quemsomos1">
				<div class="col-md-6">
					<img class="img-luis" src="http://localhost:8000/imgs/luis.jpg">
					<span>Luis Barbosa</span>
					Aluno de ciência da computação na Universidade Federal de São Carlos - Campus Sorocaba.
					Responsável pelo front-end do site.
				</div>
				<div class="col-md-6">
					<img class="img-vini" src="http://localhost:8000/imgs/vini.jpg">
					<span>Vinicius Yamamoto</span>
					Aluno de ciência da computação na Universidade Federal de São Carlos - Campus Sorocaba.
					Responsável pelo front-end do site.
				</div>
			</div>
		</div>

@endsection

@section('js')
		@parent

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAguzcFY7o2fh08MZKHlIisrTvxrHBE1Z4"></script>
		<script src="{{ URL::asset('js/index.js') }}"></script>
@endsection
    </body>
</html>
