@extends('layouts.app')

@foreach ($medico as $medico)
@endforeach

<?php var_dump($medico);?>

@section('content')
	<div class="container info-medico">
		<div class="col-md-9">
			<div class="col-md-4">
				<img class="img-medico" src="http://oregionalpr.com.br/wp-content/uploads/2013/08/istock_000019133180medium.jpg">
			</div>
			<div id="info_medico" class="col-md-8">
				<h2>{{$medico->nome }}</h2>
				<h5><strong>Email: </strong>{{$medico->email}}</h5>
				<h5><strong>Telefone: </strong>{{$medico->telefone}}</h5>
				<p>Formação:</p><h2></h2>
			</div>
		</div>
		<div class="col-md-3">
			<p>Nota Média:</p>
		</div>
	</div>

	<div class="section-2 container">

		<div class="review-medico col-md-4">

			@for ($i=0; $i < 10 ; $i++)
				<div class="item"></div>
			@endfor

		</div>


		<div id="marcar-consulta" class="marcar-consulta col-md-8">
			<h2>Marcar uma consulta</h2>
			<form id="dados-consulta" class="dados-consulta" action="" method="post">
				<div class="col-md-4">
					<p>Nome <input id="nome" type="text" ></p>
					<p>Idade <input id="idade" type="number" min="0"></p>
					<p>Sexo
					<select id="sexo">
						<option value="Masculino"> Masculino </option>
						<option value="Feminino"> Feminino </option>
					</select>
					</p>
				</div>
				<div class="col-md-4">
					<p>Motivo da Consulta <textarea id="motivo_consulta" name="motivo_consulta" class="motivo_consulta"></textarea></p>
				</div>
				<div class="col-md-4">
					<p>Consultorio
						<select id="consultorio">
							<option value="Rua Brasil"> Rua Brasil </option>
						</select>
					</p>
					<p>Data da consulta <input id="data-consulta" type="date" ></p>
					<input type="button" name="agendar" value="Agendar">
				</div>
			</form>
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
