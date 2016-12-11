@extends('layouts.app')

@foreach ($medico as $medico)
@endforeach

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
				<h5><strong>Endereço: </strong>{{$medico->endereco}}</h5>
			</div>
		</div>
		<div class="col-md-3">
			<p>Nota Média: <?php echo $medico->nota == -1 ? 'Médico não avaliado' : $medico->nota ?></p>
		</div>
		<div class="container avaliar-btn"><a id="avaliar-btn">Avaliar este médico</a></div>
	</div>

	<div class="section-2 container">

		<div class="review-medico col-md-4">

			@foreach ($comentarios as $comentario)
				<div class="item">
					<p><span>Nota:</span> {{ $comentario->nota}}</p>
					<p><span>Comentário:</span> {{$comentario->comentarios}}</p>
				</div>
			@endforeach

		</div>


		<div id="marcar-consulta" class="marcar-consulta col-md-8">
			<h2>Marcar uma consulta</h2>

			@if (Auth::guest())
			<form id="dados-consulta" class="dados-consulta" action="{{ URL::to('/') }}/marcar-consulta" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id" value="{{$medico->id}}">

				<table class="agendar-consulta">
					<tbody>
						<tr>
							<td>Motivo da Consulta</td>
							<td><textarea id="motivo_consulta" name="motivo_consulta" class="motivo_consulta"></textarea></td>
						</tr>
						<tr>
							<td>Consultorio</td>
							<td>
								<select name="consultorio" id="consultorio">
								@foreach ($consultorios as $consultorio)
									<option value="{{$consultorio->id_consultorio}}">{{$consultorio->endereco}}, {{$consultorio->numero}}</option>
								@endforeach
								</select>
							</td>
						</tr>
						<tr>
							<td>Data da Consulta</td>
							<td>
								<input id="data-consulta" name="data_consulta" type="date" >
							</td>
						</tr>
						<tr>
							<td><input id="consulta-btn" type="submit" name="agendar" value="Agendar"></td>
						</tr>
					</tbody>
				</table>
			</form>

			@else
				<h3>É preciso estar logado como paciente para realizar um pedido de consulta.</h3>
			@endif
		</div>

	<!-- 			<div id="marcar-consulta" class="marcar-consulta col-md-8">
			<div class="container"><span>Para agendar uma consulta é necessário estar logado como paciente.</span></div>
		</div> -->
	</div>

	<div id="avaliar-box" class="avaliar-box">
		<div>
			<form id="avaliacao-medico" action="{{ URL::to('/') }}/avalia-medico" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id" value="{{$medico->id}}">
				<label>Nota</label><input id="nota" name="nota" type="number" min="0" max="5" \>
				<label>Comentários sobre o médico</label><textarea id="comentarios_avaliacao" name="comentarios_avaliacao" class="comentarios-avaliacao"></textarea>
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
