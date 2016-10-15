@extends('layouts.app')

@section('content')
	<div class="container info-medico">
		<div>
			<div class="col-md-3">
				<img class="img-medico" src="http://oregionalpr.com.br/wp-content/uploads/2013/08/istock_000019133180medium.jpg">
			</div>
			<div id="info_medico" class="col-md-3">
				<p>Nome:</p><h2></h2>
				<p>Especialidade:</p><h2></h2>
				<p>Formação:</p><h2></h2>
			</div>
		</div>
		<div class="col-md-3">
			<p>Nota Média:</p>
		</div>
	</div>

	<div class="section-2 container">

		<div class="review-medico col-md-4">
			
			<?php 

				for ($i=0; $i < 10 ; $i++) { 
					echo '<div class="item"></div>';
				}

			?>

		</div>

		<div id="marcar-consulta" class="marcar-consulta col-md-8">
			<form id="dados-consulta" action="" method="post">
				<div class="col-md-4">
					<p>Dados:</p>
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
					<p>Motivo da Consulta <input id="nome" type="text" ></p>
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
