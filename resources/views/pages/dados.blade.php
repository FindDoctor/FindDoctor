@extends('layouts.app')


<!-- Dados para login de teste: 

drluizmarcel@gmail.com
JohnDoe
 -->


@section('content')

@if (Auth::guard("medico")->user())
	<!--  MEDICO -->
<div class="content">
	<div class="dados container" id="dados">

	<form id="formulario_dados" class="formulario_dados" method="POST"  action="{{ url('/atualiza') }}" accept-charset="UTF-8" enctype="multipart/form-data">

	<input name="_token" type="hidden" value="0rr2YVuOHIG9CPW9UFqnrJWB7TkkyOXTTLIW4586">
	
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
		</ul>

		<span id="consultorios-btn" class="btn">+ Adicionar</span>	
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
				<td><input type="text" disabled name="nome" value='{{ Auth::guard("medico")->user()->nome }}'></td>
			</tr>
			<tr>
				<td>CPF</td>
				<td><input type="text" disabled name="crm" value='{{ Auth::guard("medico")->user()->cpf }}'></td>
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


@endsection

@section('js')
		@parent

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAguzcFY7o2fh08MZKHlIisrTvxrHBE1Z4"></script>
		<script src="{{ URL::asset('js/register.js') }}"></script>
@endsection
    </body>
</html>