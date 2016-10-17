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
		<div class="container avaliar-btn"><a id="avaliar-btn">Avaliar este médico</a></div>
	</div>

	<div class="section-2 container">

		<div class="review-medico col-md-4">

			@for ($i=0; $i < 10 ; $i++)
				<div class="item"></div>
			@endfor

		</div>


		<div id="marcar-consulta" class="marcar-consulta col-md-8">
			<h2>Marcar uma consulta</h2>
			<form id="dados-consulta" class="dados-consulta" action="{{ URL::to('/') }}/marcar-consulta" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="crm" value="{{$medico->crm}}">
				<div class="col-md-4">
					<p>Motivo da Consulta <textarea id="motivo_consulta" name="motivo_consulta" class="motivo_consulta"></textarea></p>
				</div>
				<div class="col-md-4">
					<p>Consultorio
						<select name="consultorio" id="consultorio">
							<option value="Rua Brasil"> Rua Brasil </option>
						</select>
					</p>
					<p>Data da consulta <input id="data-consulta" name="data-consulta" type="date" ></p>
					<input type="submit" name="agendar" value="Agendar">
				</div>
			</form>
		</div>

	<!-- 			<div id="marcar-consulta" class="marcar-consulta col-md-8">
			<div class="container"><span>Para agendar uma consulta é necessário estar logado como paciente.</span></div>
		</div> -->
	</div>

	<div id="avaliar-box" class="avaliar-box">
		<div>
			<form id="avaliacao-medico">
				<p class="col-md-4">Nota <input id="nota" name="nota" type="number" min="0" max="5" \></p>
				<p class="col-md-8">Comentários sobre o médico <textarea id="comentarios_avaliacao" name="comentarios_avaliacao" class="comentarios-avaliacao"></textarea></p>

			</form>
		</div>
		<div>
			<a class="btn" id="avaliar-box-fechar-btn">Voltar</a>
			<a class="btn" id="avaliar-box-enviar-btn">Enviar Avaliação</a>
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
