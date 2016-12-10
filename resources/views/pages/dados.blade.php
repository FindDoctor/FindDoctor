@extends('layouts.app')


<!-- Dados para login de teste:

drluizmarcel@gmail.com
JohnDoe
 -->


@section('content')

@if (Auth::guard("medico")->user())
	<!--  MEDICO -->
<div class="content container">
	<div class="dados container" id="dados">

	<h3>Dados do médico</h3>

	<form id="formulario_dados" class="formulario_dados" method="POST"  action="{{ url('/atualiza') }}" accept-charset="UTF-8" enctype="multipart/form-data">

	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

	<table>
		<tbody>
			<tr>
				<td>Nome:</td>
				<input type="hidden" name="id" value='{{ Auth::guard("medico")->user()->id }}'>
				<td><input type="text" disabled name="nome" value='{{ Auth::guard("medico")->user()->nome }}'></td>
			</tr>
			<tr>
				<td>CRM</td>
				<td><input type="text" disabled name="crm" value='{{ Auth::guard("medico")->user()->crm }}'></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" disabled name="email" value='{{ Auth::guard("medico")->user()->email }}'></td>
			</tr>
			<tr>
				<td>Telefone</td>
				<td><input type="text" disabled name="telefone" value='{{ Auth::guard("medico")->user()->telefone }}'></td>
			</tr>
			<tr>
				<td>CEP</td>
				<td><input type="text" disabled name="cep" value='{{ Auth::guard("medico")->user()->cep }}'></td>
			</tr>
			<tr>
				<td>Endereço</td>
				<td><input type="tex" disabled name="endereco" value='{{ Auth::guard("medico")->user()->endereco }}'></td>
			</tr>
			<tr>
				<td>Número</td>
				<td><input type="text" disabled name="numero" value='{{ Auth::guard("medico")->user()->numero }}'></td>
			</tr>
			<tr>
				<td>Complemento</td>
				<td><input type="text" disabled name="complemento" value='{{ Auth::guard("medico")->user()->complemento }}'></td>
			</tr>
			<tr>
				<td>Bairro</td>
				<td><input type="text" disabled name="bairro" value='{{ Auth::guard("medico")->user()->bairro }}'></td>
			</tr>
			<tr>
				<td>Cidade</td>
				<td><input type="text" disabled name="cidade" value='{{ Auth::guard("medico")->user()->cidade }}'></td>
			</tr>
			<tr>
				<td>Estado</td>
				<td><input type="text" disabled name="estado" value='{{ Auth::guard("medico")->user()->estado }}'></td>
			</tr>

			<tr id="tr-foto">
				<td>Foto</td>
				<td>
		        	{!! Form::open(array('url'=>'apply/upload','method'=>'POST', 'files'=>true)) !!}
				         <div class="control-group">
				          <div class="controls">
				          {!! Form::file('image') !!}
					  <p class="errors">{!!$errors->first('image')!!}</p>
					@if(Session::has('error'))
					<p class="errors">{!! Session::get('error') !!}</p>
					@endif
		        </div>
		        </div>

				</td>

			</tr>
			<tr>
				<td><input id="alterarDados" type="submit" name="submit" value="Alterar dados" class="btn" style="display: none;"></td>
				<td><span id="voltar_btn" class="btn" style="display: none;">Voltar</span></td>
			</tr>

		</tbody>

	</table>

    {!! Form::close() !!}
	</form>

	<span id="alterar_dados_btn" class="btn">Alterar Dados</span>

	</div>

	<div class="consultorios container" id="consultorios">
		<h3>Consultorios:</h3>
		<ul id="consultorios-list">
			@foreach ($consultorios as $consultorio)

			<li>
				<div>
					<div class="container panel panel-default" data-toggle="collapse" data-target="#{{$consultorio->id_consultorio }}">

						<div class="panel-heading">
							<h3 class="panel-title" style="float:left;line-height:34px;">{{$consultorio->endereco}}, {{$consultorio->numero}}</h3>
						</div>

						<div id="{{$consultorio->id_consultorio }}" class="collapse panel-body">
							<form id="consultorios-form" accept-charset="UTF-8" enctype="multipart/form-data" method="POST">
								<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
								<input id="nome_consultorio" type="hidden" name="consultorio" value="{{$consultorio->id_consultorio }}"
								" >
								<table>
									<tbody>
										<tr>
											<td>
												Telefone:
											</td>

											<td>
												<input type="text" name="telefone" value="{{$consultorio->telefone }}">
											</td>
										</tr>

										<tr>
											<td>
												CEP:
											</td>

											<td>
												<input type="text" name="cep" value="{{$consultorio->cep }}">
											</td>
										</tr>

										<tr>
											<td>
												Endereço:
											</td>

											<td>
												<input type="text" name="endereco" value="{{$consultorio->endereco }}">
											</td>
										</tr>

										<tr>
											<td>
												Número:
											</td>

											<td>
												<input type="text" name="numero" value="{{$consultorio->numero }}">
											</td>
										</tr>

										<tr>
											<td>
												Complemento:
											</td>

											<td>
												<input type="text" name="telefone" value="{{$consultorio->complemento }}">
											</td>
										</tr>

										<tr>
											<td>
												Bairro:
											</td>

											<td>
												<input type="text" name="bairro" value="{{$consultorio->bairro }}">
											</td>
										</tr>

										<tr>
											<td>
												Cidade:
											</td>

											<td>
												<input type="text" name="cidade" value="{{$consultorio->cidade }}">
											</td>
										</tr>

										<tr>
											<td>
												Estado:
											</td>

											<td>
												<input type="text" name="estado" value="{{$consultorio->estado }}">
											</td>
										</tr>

									</tbody>
								</table>
								<br>

								<input id="salvarConsultorio" formaction="{{ url('/atualizaConsultorio') }}" type="submit" name="Salvarsubmit" value="Salvar" class="btn consultorio-btn" >
								<input id="removerConsultorio" formaction="{{ url('/removerConsultorio') }}" type="submit" name="Removersubmit" value="Remover" class="btn consultorio-btn right" >
							</form>
						</div>
					</div>
				</div>
			</li>

			@endforeach

			<li><span id="btn-add" class="btn"> + Adicionar consultório</span></li>

			<li id="li_novo_consultorio" class="novo_consultorio">
				<div>
					<div class="container panel panel-default" data-toggle="collapse" data-target="#novoConsultorio">

						<div class="panel-heading">
							<h3 class="panel-title" style="float:left;line-height:34px;">Novo consultorio</h3>
						</div>

						<div id="novoConsultorio" class="collapse panel-body">
							<form id="consultorios-form" accept-charset="UTF-8" enctype="multipart/form-data" method="POST">
								<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
								<input type="hidden" name="id" value='{{ Auth::guard("medico")->user()->id }}'>
								<input id="nome_consultorio" type="hidden" name="consultorio" value=""
								" >
								<table>
									<tbody>
										<tr>
											<td>
												Telefone:
											</td>

											<td>
												<input type="text" name="telefone">
											</td>
										</tr>

										<tr>
											<td>
												CEP:
											</td>

											<td>
												<input type="text" name="cep">
											</td>
										</tr>

										<tr>
											<td>
												Endereço:
											</td>

											<td>
												<input type="text" name="endereco">
											</td>
										</tr>

										<tr>
											<td>
												Número:
											</td>

											<td>
												<input type="text" name="numero">
											</td>
										</tr>

										<tr>
											<td>
												Complemento:
											</td>

											<td>
												<input type="text" name="telefone" >
											</td>
										</tr>

										<tr>
											<td>
												Bairro:
											</td>

											<td>
												<input type="text" name="bairro">
											</td>
										</tr>

										<tr>
											<td>
												Cidade:
											</td>

											<td>
												<input type="text" name="cidade">
											</td>
										</tr>

										<tr>
											<td>
												Estado:
											</td>

											<td>
												<input type="text" name="estado">
											</td>
										</tr>

									</tbody>
								</table>
								<br>

								<input id="salvarConsultorio" formaction="{{ url('/adicionarConsultorio') }}" type="submit" name="Salvarsubmit" value="Salvar" class="btn consultorio-btn" >
							</form>
						</div>
					</div>
				</div>
			</li>



		</ul>

	</div>

</div>

@else
	<!-- USUARIO COMUM -->


	<div class="content">
	<div class="dados" id="dados">
	<form>
	<table>
		<tbody>
			<tr>
				<td>Nome:</td>
				<td><input type="text" disabled name="nome" value='{{ Auth::guard("paciente")->user()->nome }}'></td>
			</tr>
			<tr>
				<td>CPF</td>
				<td><input type="text" disabled name="crm" value='{{ Auth::guard("paciente")->user()->cpf }}'></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" disabled name="email" value='{{ Auth::guard("paciente")->user()->email }}'></td>
			</tr>
			<tr>
				<td>Telefone</td>
				<td><input type="text" disabled name="telefone" value='{{ Auth::guard("paciente")->user()->telefone }}'></td>
			</tr>
			<tr>
				<td>CEP</td>
				<td><input type="text" disabled name="cep" value='{{ Auth::guard("paciente")->user()->cep }}'></td>
			</tr>
			<tr>
				<td>Endereço</td>
				<td><input type="tex" disabled name="endereco" value='{{ Auth::guard("paciente")->user()->endereco }}'></td>
			</tr>
			<tr>
				<td>Número</td>
				<td><input type="text" disabled name="numero" value='{{ Auth::guard("paciente")->user()->numero }}'></td>
			</tr>
			<tr>
				<td>Complemento</td>
				<td><input type="text" disabled name="complemento" value='{{ Auth::guard("paciente")->user()->complemento }}'></td>
			</tr>
			<tr>
				<td>Bairro</td>
				<td><input type="text" disabled name="bairro" value='{{ Auth::guard("paciente")->user()->bairro }}'></td>
			</tr>
			<tr>
				<td>Cidade</td>
				<td><input type="text" disabled name="cidade" value='{{ Auth::guard("paciente")->user()->cidade }}'></td>
			</tr>
			<tr>
				<td>Estado</td>
				<td><input type="text" disabled name="estado" value='{{ Auth::guard("paciente")->user()->estado }}'></td>
			</tr>

			<tr>
				<td><input id="alterarDados" type="submit" name="submit" value="Alterar dados" class="btn" style="display: none;"></td>
				<td><span id="voltar_btn" class="btn" style="display: none;">Voltar</span></td>
			</tr>

		</tbody>

	</table>

	</form>


	<span id="alterar_dados_btn" class="btn">Alterar Dados</span>


	</div>

	<div class="consultorios" id="consultorios">


	</div>

</div>
@endif

 <div class="clear"></div>

@endsection

@section('js')
		@parent
		<script type="text/javascript">
			var base_url =  '{{url('/')}}';

			var token = '{{{ csrf_token() }}}';
		</script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAguzcFY7o2fh08MZKHlIisrTvxrHBE1Z4"></script>
		<script src="{{ URL::asset('js/register.js') }}"></script>
@endsection
    </body>
</html>