$('#tipoPaciente').click(function () {
	$('#tipoCadastro').hide();
	$('#crm').remove();
	$('#formCadastro').show();
});

$('#tipoMedico').click(function () {
	$('#tipoCadastro').hide();
	$('#cpf').remove();
	$('#formCadastro').show();
});

$('#alterar_dados_btn').click(function () {
	$('#alterarDados').show();
	$( "input" ).prop( "disabled", false );
	$('#voltar_btn').show();
	$('#alterar_dados_btn').hide();
});

$('#voltar_btn').click(function () {
	$( "input" ).prop( "disabled", true );
	$('#alterarDados').hide();
	$('#voltar_btn').hide();
	$('#alterar_dados_btn').show();
});

var count = 0;

$("#consultorios-btn").click(
  function () {
     var someText = "<li>"
					+ "<div>"
					+'<div class=" container panel panel-default">'
					  + '<div class="panel-heading">'
						  + '<p>CONSULTORIO N'
						  	+ '<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo' + count + '">V</button>'
						  + '</p>'
					  + '</div>'

					  + '<div id="demo' + count + '" class="collapse panel-body">'
					    + '<form id="consultorios-form">'
							+ '<input id="nome_consultorio" type="text" name="consultorio">'
							+ '<input id="salvarConsultorio" type="submit" name="Salvarsubmit" value="Salvar Consultorio" class="btn" >'
							+ '<input id="removerConsultorio" type="submit" name="Removersubmit" value="Remover Consultorio" class="btn" >'
						+ '</form>'
					  + '</div>'
					+ '</div>'
				+ '</div>'
			+ '</li>';
     var newDiv = $("<div>").append(someText).click(function () {});
     $('#consultorios-list').append(newDiv);
     count++;
  }
)