@extends('layouts.app')

@section('content')

@if (Auth::guard("medico")->user())
	<!--  MEDICO -->
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

			<tr id="tr-foto" style="display: none;">
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
				<td><input id="alterarDados" type="submit" name="submit" value="Alterar dados" style="display: none;"></td>
			</tr>

		</tbody>

	</table>
	
	</form>
		


	</div>

	<div class="consultorios" id="consultorios">
		

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
				<td><input id="alterarDados" type="submit" name="submit" value="Alterar dados"></td>
			</tr>

		</tbody>

	</table>
	
	</form>
		


	</div>

	<div class="consultorios" id="consultorios">
		

	</div>

</div>
@endif


@endsection

@section('js')
		@parent

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAguzcFY7o2fh08MZKHlIisrTvxrHBE1Z4"></script>
		<script src="{{ URL::asset('js/index.js') }}"></script>
@endsection
    </body>
</html>