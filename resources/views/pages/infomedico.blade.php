@extends('layouts.app')


@section('content')
  <div class="container infomedico">
    <p>Informações</p>
  </div>

  <div class="container avaliacoes-consultas">
    <div class="avaliacoes col-md-2">
      <p>Avaliações</p>
      <div class="avaliacao">
        <p>Nome</p>
        <p>Esse é médico é gente fina, muito bom e atencioso, esses cabelos grisalhos e esse sorriso branquinho me atraem</p>
      </div>
    </div>
    <div class="pedidos-consulta col-md-2">
      <p>Consultas</p>
      <div class="consultas">
        <p>19/03/2016 10:30AM</p>
      </div>
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
