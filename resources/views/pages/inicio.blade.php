@extends('layouts.app')

@section('content')
		    <div class="map" id="map"></div>
        <div id="filtros" class="filtros">
                <form id="filtros-home" class="form-horizontal">
                    <fieldset>
                    <!-- Select Basic -->
                    <div class="form-group">
                     <div class="col-md-4">
                      <label class="control-label" for="selectbasic">Especialidade</label>
                        <select id="selectbasic" name="selectbasic" class="form-control">
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

                      <div class="col-md-4">
                        <label class="control-label" for="localizacao">Localização</label>
                        <input id="localizacao" name="localizacao" type="text" placeholder="Ex.:São Paulo" class="form-control input-md">
                      </div>

                    <!-- Text input-->
                      <div class="col-md-4">
                        <label class="control-label" for="nome">Nome do médico</label>
                        <input id="nome" name="nome" type="text" placeholder="Ex.Antonio" class="form-control input-md">
                      </div>

                    </div>

                    </fieldset>
                    </form>
            </div>


        <div class="container">


            <div id="cards-medicos" class="cards cards-medicos">
                <div class="row">

                @for($x = 0; $x < 10; $x++)
                    <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                      <img src="http://oregionalpr.com.br/wp-content/uploads/2013/08/istock_000019133180medium.jpg" alt="...">
                      <div class="caption">
                        <h3>Nome do Medico</h3>
                        <p>Info do médico</p>
                        <p><a href="#" class="btn btn-primary" role="button">Ver Médico</a></p>
                      </div>
                    </div>
                    </div>
				@endfor

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
