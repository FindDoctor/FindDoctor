{!! session()->forget('socialAccount') !!}
@extends('layouts.app')

@section('css')
	@parent
	<link href="{{ URL::asset('css/bootstrap-social.min.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Entrar</div>
                <div class="panel-body">
                    <form id="loginForm" class="form-horizontal" role="form" method="POST" action="{{ url('/paciente/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Endereço de E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

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

                        <div class="form-group">
                            <label for="tipo" class="col-md-4 control-label">Tipo de usuário</label>

                            <div class="col-md-6">
                                <select id="tipo" class="form-control" name="tipo" required>
                                    <option value="0">Paciente</option>
									<option value="1">Medico</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Lembrar-me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Entrar
                                </button>

								<a href="{{ url('social/facebook/redirect') }}" class="btn btn-social btn-facebook">
                                    <span class="fa fa-facebook"></span> Entrar com o Facebook
                                </a>

<!-- 								<a href="{{ url('social/google/redirect') }}" class="btn btn-social btn-google">
                                    <span class="fa fa-google"></span> Entrar com o Google Plus
                                </a> -->

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Esqueceu sua senha?
                                </a>
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
	<script src="{{ URL::asset('js/login.js') }}"></script>
@endsection
