@extends('layouts.app')


@section('content')

  <div class="container info-medico">
    <div class="col-md-9">
      <div class="col-md-4">
        <img class="img-medico" src="http://oregionalpr.com.br/wp-content/uploads/2013/08/istock_000019133180medium.jpg">
      </div>
      <div id="info_medico" class="col-md-8">
        <h2></h2>
        <h5><strong>Email: </strong></h5>
        <h5><strong>Telefone: </strong></h5>
        <p>Formação:</p><h2></h2>
      </div>
    </div>
    <div class="col-md-3">
      <p>Nota Média:</p>
    </div>
    <div class="container avaliar-btn"><a id="avaliar-btn">Avaliar este médico</a></div>
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
