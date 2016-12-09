@extends('layouts.app')


@section('content')
	<div class="contato">
		<div class="titulo">
			Mensagem:
		</div>
		Nome: <br><input type="text" name="txtNome">
		<br>Email: <br><input type="text" name="txtEmail">
		<br>Mensagem: <br><textarea id="mensagem" name="mensagem" class="mensagem"></textarea>
		<br><input type="Submit" name="btnEnviar" value="Enviar">
	</div>

@endsection

@section('js')
		@parent

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAguzcFY7o2fh08MZKHlIisrTvxrHBE1Z4"></script>
		<script src="{{ URL::asset('js/index.js') }}"></script>
@endsection
    </body>
</html>
