@extends('layouts.app')


@section('content')
	<div class="quemsomos">
		<div class="titulo">Quem somos</div>
		<div class="container quemsomos1">
				<div class="col-md-3">
					<img class="img-bertz" src="http://localhost:8000/imgs/bertz.jpg">
					<br>Lucas Bertone
					<br>Aluno de ciência da computação na Universidade Federal de São Carlos - Campus Sorocaba.
					Responsável pelo back-end do site.
				</div>
				<div class="col-md-3">
					<img class="img-math" src="http://localhost:8000/imgs/math.jpg">
					<br>Matheus Pinheiro
					<br>Aluno de ciência da computação na Universidade Federal de São Carlos - Campus Sorocaba.
					Responsável pelo back-end do site.
				</div>
			</div>
			<div class="container quemsomos2">
				<div class="col-md-3">
					<img class="img-luis" src="http://localhost:8000/imgs/luis.jpg">
					<br>Luis Barbosa
					<br>Aluno de ciência da computação na Universidade Federal de São Carlos - Campus Sorocaba.
					Responsável pelo front-end do site.
				</div>
				<div class="col-md-3">
					<img class="img-vini" src="http://localhost:8000/imgs/vini.jpg">
					<br>Vinicius Yamamoto
					<br>Aluno de ciência da computação na Universidade Federal de São Carlos - Campus Sorocaba.
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
