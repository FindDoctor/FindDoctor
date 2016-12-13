{!! session()->forget('socialAccount') !!}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastrar</div>
                <div class="panel-body">
				@if ( !$errors->any() )
					<div id="tipoCadastro" class="form-group">
						<div id="tipoCadastro" class="col-md-6 col-md-offset-4">
							<button class="btn btn-primary" id="tipoPaciente">
								Sou paciente
							</button>
							<button class="btn btn-primary" id="tipoMedico">
								Sou médico
							</button>
						</div>
					</div>
				@endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ (old('cpf') || $errors->has('cpf')) ? url('/paciente/register') : url('/medico/register') }}" id="formCadastro" {{ !$errors->any() ? 'hidden' : '' }} enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                            <label for="nome" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" required autofocus>

                                @if ($errors->has('nome'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

					@if (!$errors->any() || old('cpf') || $errors->has('cpf'))
                        <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}" id="cpf">
                            <label for="cpf" class="col-md-4 control-label">CPF</label>

                            <div class="col-md-6">
                                <input id="cpf_input" type="text" class="form-control" name="cpf" value="{{ old('cpf') }}" required autofocus>

                                @if ($errors->has('cpf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
					@endif

					@if (!$errors->any() || old('crm') || $errors->has('crm'))
                        <div class="form-group{{ $errors->has('crm') ? ' has-error' : '' }}" id="crm">
                            <label for="crm" class="col-md-4 control-label">CRM</label>

                            <div class="col-md-6">
                                <input id="crm" type="text" class="form-control" name="crm" value="{{ old('crm') }}" required autofocus>

                                @if ($errors->has('crm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('crm') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
					@endif
          @if (!$errors->any() || old('crm') || $errors->has('crm'))
          <div class="form-group especialidade">
            <label class="col-md-4 control-label" for="especialidade">Especialidade</label>
            <div class="col-md-6">
              <select id="especialidade" name="especialidade" class="form-control">
                <option value="Todas">Todas</option>
                <option value="Anatomia Patológica">Anatomia Patológica</option>
                <option value="Anestesiologia">Anestesiologia</option>
                <option value="Angiologia e Cirurgia Vascular">Angiologia e Cirurgia Vascular</option>
                <option value="Cardiologia">Cardiologia</option>
                <option value="Cardiologia Pediátrica">Cardiologia Pediátrica</option>
                <option value="Cirurgia Cardiotorácica">Cirurgia Cardiotorácica</option>
                <option value="Cirurgia Geral">Cirurgia Geral</option>
                <option value="Cirurgia Maxilo-Facial">Cirurgia Maxilo-Facial</option>
                <option value="Cirurgia Pediátrica">Cirurgia Pediátrica</option>
                <option value="Cirurgia Plástica Reconstrutiva e Estética">Cirurgia Plástica Reconstrutiva e Estética</option>
                <option value="Dermato-Venereologia">Dermato-Venereologia</option>
                <option value="Doenças Infecciosas">Doenças Infecciosas</option>
                <option value="Endocrinologia e Nutrição">Endocrinologia e Nutrição</option>
                <option value="Estomatologia">Estomatologia</option>
                <option value="Gastrenterologia">Gastrenterologia</option>
                <option value="Genética Médica">Genética Médica</option>
                <option value="Ginecologia/Obstetrícia">Ginecologia/Obstetrícia</option>
                <option value="Imunoalergologia">Imunoalergologia</option>
                <option value="Imunohemoterapia">Imunohemoterapia</option>
                <option value="Farmacologia Clínica">Farmacologia Clínica</option>
                <option value="Hematologia Clínica">Hematologia Clínica</option>
                <option value="Medicina Desportiva">Medicina Desportiva</option>
                <option value="Medicina do Trabalho">Medicina do Trabalho</option>
                <option value="Medicina Física e de Reabilitação">Medicina Física e de Reabilitação</option>
                <option value="Medicina Geral e Familiar">Medicina Geral e Familiar</option>
                <option value="Medicina Interna">Medicina Interna</option>
                <option value="Medicina Legal">Medicina Legal</option>
                <option value="Medicina Nuclear">Medicina Nuclear</option>
                <option value="Medicina Tropical">Medicina Tropical</option>
                <option value="Nefrologia">Nefrologia</option>
                <option value="Neurocirurgia">Neurocirurgia</option>
                <option value="Neurologia">Neurologia</option>
                <option value="Neurorradiologia">Neurorradiologia</option>
                <option value="Oftalmologia">Oftalmologia</option>
                <option value="Oncologia Médica">Oncologia Médica</option>
                <option value="Ortopedia">Ortopedia</option>
                <option value="Otorrinolaringologia">Otorrinolaringologia</option>
                <option value="Patologia Clínica">Patologia Clínica</option>
                <option value="Pediatria">Pediatria</option>
                <option value="Pneumologia">Pneumologia</option>
                <option value="Psiquiatria">Psiquiatria</option>
                <option value="Psiquiatria da Infância e da Adolescência">Psiquiatria da Infância e da Adolescência</option>
                <option value="Radiologia">Radiologia</option>
                <option value="Radioncologia">Radioncologia</option>
                <option value="Reumatologia">Reumatologia</option>
                <option value="Saúde Pública">Saúde Pública</option>
                <option value="Urologia">Urologia</option>
              </select>
            </div>
          </div>
          @endif
                        <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
                            <label for="telefone" class="col-md-4 control-label">Telefone</label>

                            <div class="col-md-6">
                                <input id="telefone" type="text" class="form-control" name="telefone" value="{{ old('telefone') }}" required autofocus>

                                @if ($errors->has('telefone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('cep') ? ' has-error' : '' }}">
                            <label for="cep" class="col-md-4 control-label">CEP</label>

                            <div class="col-md-6">
                                <input id="cep" type="text" class="form-control" name="cep" value="{{ old('cep') }}" required autofocus>

                                @if ($errors->has('cep'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cep') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('endereco') ? ' has-error' : '' }}">
                            <label for="endereco" class="col-md-4 control-label">Endereço</label>

                            <div class="col-md-6">
                                <input id="endereco" type="text" class="form-control" name="endereco" value="{{ old('endereco') }}" required autofocus>

                                @if ($errors->has('endereco'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('endereco') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bairro') ? ' has-error' : '' }}">
                            <label for="bairro" class="col-md-4 control-label">Bairro</label>

                            <div class="col-md-6">
                                <input id="bairro" type="text" class="form-control" name="bairro" value="{{ old('bairro') }}" required autofocus>

                                @if ($errors->has('bairro'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bairro') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cidade') ? ' has-error' : '' }}">
                            <label for="cidade" class="col-md-4 control-label">Cidade</label>

                            <div class="col-md-6">
                                <input id="cidade" type="text" class="form-control" name="cidade" value="{{ old('cidade') }}" required autofocus>

                                @if ($errors->has('cidade'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cidade') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
                            <label for="estado" class="col-md-4 control-label">Estado</label>

                            <div class="col-md-6">
                                <input id="estado" type="text" class="form-control" name="estado" value="{{ old('estado') }}" required autofocus>

                                @if ($errors->has('estado'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('estado') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('numero') ? ' has-error' : '' }}">
                            <label for="numero" class="col-md-4 control-label">N° </label>

                            <div class="col-md-6">
                                <input id="numero" type="text" class="form-control" name="numero" value="{{ old('numero') }}" required autofocus>

                                @if ($errors->has('numero'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('numero') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('complemento') ? ' has-error' : '' }}">
                            <label for="complemento" class="col-md-4 control-label">Complemento</label>

                            <div class="col-md-6">
                                <input id="complemento" type="text" class="form-control" name="complemento" value="{{ old('complemento') }}" autofocus>

                                @if ($errors->has('complemento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('complemento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						@if (!$errors->any() || old('crm') || $errors->has('crm'))
                        <div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}" id="foto">
                            <label for="foto" class="col-md-4 control-label">Foto</label>

                            <div class="col-md-6">
                                <input id="foto" type="file" name="foto" accept="image/*" value="{{ old('foto') }}" autofocus>

                                @if ($errors->has('foto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('foto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						@endif

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Cadastrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
	@parent
	<script type="text/javascript">
		function cep_callback(conteudo) {
			if (!("erro" in conteudo)) {
				//Atualiza os campos com os valores.
				$('#endereco').val(conteudo.logradouro);
				$('#bairro').val(conteudo.bairro);
				$('#cidade').val(conteudo.localidade);
				$('#estado').val(conteudo.uf);
				$('#numero').focus();
			} //end if.
			else {
				//CEP não Encontrado.
				$('#endereco').val("");
				$('#bairro').val("");
				$('#cidade').val("");
				$('#estado').val("");
				alert("CEP não encontrado.");
			}
		}
	</script>
	<script src="{{ URL::asset('js/vendor/jquery.mask.min.js') }}"></script>
	<script src="{{ URL::asset('js/register.js') }}"></script>
@endsection
